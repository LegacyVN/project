<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Gallery;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    // Search users by keyword
    public function userSearchByKeyword(Request $request)
    {
        $keyword = $request->get('keyword');

        $users = User::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        $totalUsers = User::where('name', 'like', '%' . $keyword . '%')->count();

        return view('admin.user.user', [
            'users' => $users,
            'totalusers' => $totalUsers,
        ]);
    }

    // View all users
    public function viewUsers()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        $totalUsers = User::count();

        return view('admin.user.user', [
            'users' => $users,
            'totalusers' => $totalUsers,
        ]);
    }

    // Show the add user form
    public function addUser()
    {
        return view('admin.user.add_user');
    }

    // Save a new user
    // public function saveUser(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'phone' => 'nullable|string|max:15',
    //         'address' => 'nullable|string|max:255',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     try {
    //         User::create([
    //             'name' => $validatedData['name'],
    //             'email' => $validatedData['email'],
    //             'phone' => $validatedData['phone'],
    //             'address' => $validatedData['address'],
    //             'password' => Hash::make($validatedData['password']),
    //             'user_status' => 1, // Default user status
    //         ]);

    //         toastr()->closeButton()->addSuccess('User Added Successfully');
    //         return redirect()->route('view_user')->with('msg', 'User added successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to add user: ' . $e->getMessage()]);
    //     }
    // }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        toastr()->closeButton()->addSuccess('User Deleted Successfully');
        return redirect()->back();
    }

    // Show the edit user form
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|string',
            // Optionally add validation for 'status' if needed
        ]);

        $user = User::findOrFail($id);

        // Update user details
        $user->update($request->except('password')); // Exclude password from mass assignment

        // Optionally update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Check if the admin is setting the user status to inactive
        if ($request->has('user_status') && $request->user_status == 0) {
            $user->user_status = 0; // Set status to inactive
            $user->save();

            // If the user is currently logged in, log them out
            if (Auth::id() === $user->id) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is inactive.');
            }
        } else {
            $user->user_status = 1; // Optionally set back to active
        }

        $user->save();

        return redirect()->route('view_user')->with('msg', 'User updated successfully.');
    }


    // View all users
    public function vieworder()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        $totalUsers = User::count();

        return view('admin.user.user', [
            'users' => $users,
            'totalusers' => $totalUsers,
        ]);
    }

    // Gallery
    public function listGallery()
    {
        $gallery = Gallery::orderBy('id')->paginate(10);
        if($gallery->isNotEmpty()){
            return view('Admin/gallery', compact('gallery'));
        }else{
            return view('Admin/gallery');
        }
        
        
    }

    public function addToGallery(){

        return view('Admin/gallery_add');
    }
    public function storeGallery(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('gallery');


            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }

            $image->move($imagePath, $imageName);
            $photo = new Gallery();
            $photo->photo_name = $imageName;
            $photo->save();
            toastr()->closeButton()->addSuccess('Image has been uploaded!');
            return redirect()->route('gallery.index');
        } else {
            toastr()->closeButton()->addError('Error occured when uploading image');
           
            return redirect()->back();
        }
    }

    public function deleteGallery($id)
    {
        try {
            $photo = Gallery::find($id);
            $image_path = public_path('gallery/' . $photo->photo_name);

            // Check if the image file exists before attempting to delete it
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the photo file from the folder
            }

            // Delete the photo from the database
            $photo->delete();
            toastr()->closeButton()->addSuccess('Image has been deleted successfully');
            return redirect()->back();
        } catch (Exception $ex) {
            toastr()->closeButton()->addError("Cannot delete image");
            return redirect()->back();
        }
    }

}

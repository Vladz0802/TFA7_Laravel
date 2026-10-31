<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    // User Accounts page (/users).
    public function index()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    // Shows the empty Create User form (/users/create).
    public function create()
    {
        return view('users.create');
    }

    // Validates the form, then inserts the new user.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required|string|max:50|unique:users,username',
            'full_name' => 'required|string|max:255',
        ]);

        User::create($validated);

        return redirect()->route('users')->with('success', 'User added.');
    }

    // Shows the Edit User form, filled in with the existing record.
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Validates the form, updates the user, and handles the avatar upload.
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            // unique, but ignore this user's own row so saving without changes works
            'username'  => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
            'full_name' => 'required|string|max:255',
            // must be an image, 2MB (2048 KB) at most
            'avatar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];

        if ($request->hasFile('avatar')) {
            // remove the old thumbnail so unused files do not pile up
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // only the path (for example avatars/abc.jpg) is saved in the database
            $user->avatar = $this->storeAvatar($request->file('avatar'));
        }

        $user->save();

        return redirect()->route('users')->with('success', 'User updated.');
    }

    // Makes a 150x150 thumbnail with Intervention Image and saves it on the public disk.
    private function storeAvatar(UploadedFile $file): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());
        $image->cover(150, 150); // crop to a square and resize

        $path = 'avatars/' . Str::uuid() . '.jpg';
        Storage::disk('public')->put($path, (string) $image->toJpeg(85));

        return $path;
    }
}

<?php

namespace App\Services;

use App\Events\UserPasswordUpdateEvent;
use App\Jobs\UserPasswordUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class UserService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user =$user;
    }

    public function update($validated)
    {

        $validated = array_filter($validated, function($value){
            return !empty($value);
        });

        if(isset($validated['password'])){
            event(new UserPasswordUpdateEvent($this->user));
            // dispatch(new UserPasswordUpdate($this->user));
        }

        $this->user->update($validated);

        if(isset($validated['image'])){
            if($this->user->profile_image){
                $oldImagePath = $this->user->profile_image;
                if(Storage::exists($oldImagePath)){
                    Storage::delete($oldImagePath);
                }
            }

            $imageName = Storage::put('images', $validated['image']);

            $this->user->profile_image = $imageName;
            $this->user->save();

        }
            return true;
    }
}



?>

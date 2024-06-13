<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddMembershipIDToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Assuming you have a user's ID or another way to retrieve the user instance
        // $userId = 8; // Example user ID
        // $user = User::find($userId);
        $users = User::all();

        foreach ($users as $user) {
            if ($user) {
            $uniqueMembershipId = $user->generateUniqueMembershipId();
            // Do something with the $uniqueMembershipId, like updating the user record
            $user->membership_id = $uniqueMembershipId;
            $user->save();
            }else{
                $this->error('User not found.');
            }
        }

        // if ($user) {
        //     $uniqueMembershipId = $user->generateUniqueMembershipId();
        //     // Do something with the $uniqueMembershipId, like updating the user record
        //     $user->membership_id = $uniqueMembershipId;
        //     $user->save();
        // } else {
        //     // Handle the case where the user doesn't exist
        //     $this->error('User not found.');
        // }
    }
}

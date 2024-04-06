<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MeetingRoom;
use App\Models\AvailabilitySlot;
use App\Models\BookingMeeting;
use App\Models\AddNotificationEmail;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([Permission::all()]);

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo(Permission::all());

        $user1 = new User;
        $user1->name = 'Admin';
        $user1->email = 'admin@gmail.com';
        $user1->password = Hash::make('admin1234');
        $user1->save();
        $user1->assignRole('admin');

        // create unique code for users


        $user2 = new User;
        $user2->name = 'user';
        $user2->phone_no = '+92 2255885';
        $user2->email = 'user@gmail.com';
        $user2->password = Hash::make('test123');
        $user2->auth_code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user2->status = true;
        $user2->save();
        $user2->assignRole('user');

        $user3 = new User;
        $user3->name = 'user2';
        $user3->phone_no = '+92 2255885';
        $user3->email = 'user2@gmail.com';
        $user3->password = Hash::make('test123');
        // $user3->auth_code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user3->status = false;
        $user3->save();
        $user3->assignRole('user');

        // meeting room
        // Seed meeting rooms
       $roomA =  MeetingRoom::create([
            'name' => 'Room A',
            'description' => 'Description of Room A',
            'capacity' => 10,
            'access_code' => str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
            'date' => '2024-04-01',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
        ]);

        $roomB = MeetingRoom::create([
            'name' => 'Room B',
            'description' => 'Description of Room B',
            'capacity' => 15,
            'access_code' => str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
            'date' => '2024-04-01',
            'start_time' => '09:30:00',
            'end_time' => '10:30:00',
        ]);

        $email1 = AddNotificationEmail::create([
            'meeting_room_id' => $roomA->id,
            'email' => 'test1@gmail.com, test2@gmail.com',

        ]);


        //  booking
        // Seed bookings
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-01 09:00:00',
            'end_time' => '2024-04-01 10:00:00',
            'status' => 'Approved',
        ]);
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-01 11:00:00',
            'end_time' => '2024-04-01 12:00:00',
            'status' => 'Approved',
        ]);
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-01 12:00:00',
            'end_time' => '2024-04-01 01:00:00',
            'status' => 'Approved',
        ]);
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-01 01:00:00',
            'end_time' => '2024-04-01 02:00:00',
            'status' => 'Approved',
        ]);
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-05 10:00:00',
            'end_time' => '2024-04-05 12:00:00',
            'status' => 'Approved',
        ]);
        BookingMeeting::create([
        'user_id' => $user2->id,
            'meeting_room_id' => $roomA->id,
            'start_time' => '2024-04-05 12:00:00',
            'end_time' => '2024-04-05 02:00:00',
            'status' => 'Reject',
        ]);
        // meeting ID2

        BookingMeeting::create([
            'user_id' => $user2->id,
            'meeting_room_id' => $roomB->id,
            'start_time' => '2024-04-05 12:00:00',
            'end_time' => '2024-04-05 02:30:00',
        ]);


    }
}
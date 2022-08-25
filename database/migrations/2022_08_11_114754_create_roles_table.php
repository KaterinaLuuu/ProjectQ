<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $user = Role::factory()->create(['name' => 'user']);
        $admin = Role::factory()->create(['name' => 'admin']);

        Schema::table('users', function (Blueprint $table) use ($user) {
            $table->unsignedBigInteger('role_id')->default($user->id);
        });

        User::factory()->create(
            [
                'email' => config('mail.site_admin.email'),
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role_id' => $admin->id,
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

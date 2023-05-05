<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anonymous:makeUserRevisor';
    protected $description = "Asigna el rol de revisor a un usuario";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask("Introducir el correo del usuario");
        $user = User::where("email",$email)->first();
        if(!$user){
            $this->error("Usuario no encontrado");
            return;
        }
        $user->is_revisor = 1;
        $user->save();
        $this->info("El usuario $user->name ya es un revisor");
    }
}
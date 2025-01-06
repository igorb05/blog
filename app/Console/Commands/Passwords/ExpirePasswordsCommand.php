<?php

namespace App\Console\Commands\Passwords;

use App\Enums\PasswordStatusEnum;
use App\Models\Password;
use Illuminate\Console\Command;

class ExpirePasswordsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:expire';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Обнуление статуса паролей...');

        $this->expirePasswords();

        $this->info('Заявки на восстановление паролей обнулены!');
    }

    private function expirePasswords(): void {
        Password::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=', now()->subHour())
            ->update(['status' => PasswordStatusEnum::expired]);
    }
}

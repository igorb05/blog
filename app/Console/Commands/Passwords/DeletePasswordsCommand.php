<?php

namespace App\Console\Commands\Passwords;

use App\Enums\PasswordStatusEnum;
use App\Models\Password;
use Illuminate\Console\Command;

class DeletePasswordsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:passwords';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Удаление старых заявок паролей...');

        $this->deletePasswords();

        $this->info('Заявки паролей удалены!');
    }

    private function deletePasswords(): void {
        Password::query()
            ->where('status', PasswordStatusEnum::expired)
            ->where('created_at', '<=', now()->subDays(30))
            ->delete();
    }
}

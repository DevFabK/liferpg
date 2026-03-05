<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_stats', function (Blueprint $table) {
            if (Schema::hasColumn('user_stats', 'strength')) {
                $table->dropColumn('strength');
            }
            if (Schema::hasColumn('user_stats', 'intelligence')) {
                $table->dropColumn('intelligence');
            }
            if (Schema::hasColumn('user_stats', 'discipline')) {
                $table->dropColumn('discipline');
            }
            if (Schema::hasColumn('user_stats', 'charisma')) {
                $table->dropColumn('charisma');
            }

            $table->integer('physical')->default(1);
            $table->integer('intellect')->default(1);
            $table->integer('discipline')->default(1);
            $table->integer('social')->default(1);
            $table->integer('creativity')->default(1);
            $table->integer('wellbeing')->default(1);
        });
    }

    public function down(): void
    {
        Schema::table('user_stats', function (Blueprint $table) {
            $table->dropColumn([
                'physical',
                'intellect',
                'discipline',
                'social',
                'creativity',
                'wellbeing'
            ]);
        });
    }
};
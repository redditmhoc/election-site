<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('local_constituencies', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->string('name');
            $table->string('slug');
            $table->integer('registered_voters')->nullable();
            $table->foreignUuid('region_id')->constrained('regions');
            $table->text('banner_url')->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('declared_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_constituencies');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceIdOnPaymentsAndRecives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recives', function (Blueprint $table) {
            $table->foreignId('sel_invoice_id')->nullable()->after('user_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('pur_invoice_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recives', function (Blueprint $table) {
            $table->dropColumn('sel_invoice_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('pur_invoice_id');
        });    
    }
}

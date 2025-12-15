 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus kolom yang tidak diperlukan
        Schema::table('kariers', function (Blueprint $table) {
            $table->dropColumn([
                'judul', 
                'lokasi', 
                'tipe_pekerjaan', 
                'benefit', 
                'gaji', 
                'batas_lamaran', 
                'status',
                'deleted_at'
            ]);
        });

        // Tambahkan kolom baru
        Schema::table('kariers', function (Blueprint $table) {
            $table->string('nama_kota')->after('id');
            $table->string('posisi')->after('nama_kota');
            $table->text('responsibilities')->after('slug');
            $table->text('requirements')->after('responsibilities');
            $table->string('email')->after('requirements');
            
            // Hapus kolom yang tidak diperlukan
            $table->dropColumn(['deskripsi', 'persyaratan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan ke struktur semula
        Schema::table('kariers', function (Blueprint $table) {
            // Hapus kolom yang baru ditambahkan
            $table->dropColumn([
                'nama_kota',
                'posisi',
                'responsibilities',
                'requirements',
                'email'
            ]);

            // Kembalikan kolom yang dihapus
            $table->string('judul');
            $table->string('lokasi');
            $table->string('tipe_pekerjaan');
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->text('benefit')->nullable();
            $table->string('gaji')->nullable();
            $table->date('batas_lamaran')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
        });
    }
};

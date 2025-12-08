<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $quiz = Quiz::create([
        'title' => 'Zaman Praaksara di Indonesia',
        'description' => 'Kuis sejarah Indonesia kuno',
        'thumbnail' => 'praaksara.jpeg',
    ]);

    $q1 = $quiz->questions()->create([
        'question_text' => 'Zaman praaksara di Indonesia berakhir ketika masyarakat mulai mengenal?'
    ]);

    $q1->options()->createMany([
        ['option_text' => 'Tulisan', 'is_correct' => true],
        ['option_text' => 'Sistem Barter', 'is_correct' => false],
        ['option_text' => 'Logam', 'is_correct' => false],
        ['option_text' => 'Pertanian', 'is_correct' => false],
    ]);

    $q2 = $quiz->questions()->create([
        'question_text' => 'Para arkeolog telah menemukan fosil tengkorang manusia serta 
        peralatannya. Fosil manusia menunjukkan adanya perbedaan bentuk tubuh manusia saat itu dengan masa
        sekarang. Perbedaannya yang paling menonjol adalah'
    ]);

    $q2->options()->createMany([
        ['option_text' => 'Perbedaan tinggi badan', 'is_correct' => false],
        ['option_text' => 'Perbedaan bentuk tangan', 'is_correct' => false],
        ['option_text' => 'Perbedaan bentuk tubuh', 'is_correct' => false],
        ['option_text' => 'Perbedaan bentuk tubuh dan volume otak', 'is_correct' => true],
    ]);

    $q3 = $quiz->questions()->create([
        'question_text' => 'Zaman Batu di Indonesia terbagi menjadi beberapa periode. Salah satu periode yang menggunakan alat serpih adalah?'
    ]);

    $q3->options()->createMany([
        ['option_text' => 'Paleolitikum', 'is_correct' => true],
        ['option_text' => 'Mesolitikum', 'is_correct' => false],
        ['option_text' => 'Neolitikum', 'is_correct' => false],
        ['option_text' => 'Megalitikum', 'is_correct' => false],
    ]);

    $q4 = $quiz->questions()->create([
        'question_text' => 'Salah satu ciri utama manusia purba Homo Erectus adalah?'
    ]);

    $q4->options()->createMany([
        ['option_text' => 'Sudah mengenal corak budaya tertulis', 'is_correct' => false],
        ['option_text' => 'Memiliki volume otak lebih besar dibanding Homo sapiens', 'is_correct' => false],
        ['option_text' => 'Berjalan tegak dan memiliki alat sederhana', 'is_correct' => true],
        ['option_text' => 'Memiliki tinggi badan sangat pendek', 'is_correct' => false],
    ]);

    $q5 = $quiz->questions()->create([
        'question_text' => 'Zaman praaksara disebut juga zaman nirleka yang berarti?'
    ]);

    $q5->options()->createMany([
        ['option_text' => 'Tidak ada pemerintah', 'is_correct' => false],
        ['option_text' => 'Tidak mengenal tulisan', 'is_correct' => true],
        ['option_text' => 'Tidak mengenal logam', 'is_correct' => false],
        ['option_text' => 'Tidak mengenal agama', 'is_correct' => false],
    ]);

    $q6 = $quiz->questions()->create([
        'question_text' => 'Manusia purba yang ditemukan oleh Eugene Dubois di Trinil dikenal sebagai?'
    ]);

    $q6->options()->createMany([
        ['option_text' => 'Homo Wajakensis', 'is_correct' => false],
        ['option_text' => 'Homo Floresiensis', 'is_correct' => false],
        ['option_text' => 'Pithecanthropus Erectus', 'is_correct' => true],
        ['option_text' => 'Meganthropus Paleojavanicus', 'is_correct' => false],
    ]);

    $q7 = $quiz->questions()->create([
        'question_text' => 'Corak kehidupan masyarakat pada masa berburu dan meramu tingkat sederhana adalah?'
    ]);

    $q7->options()->createMany([
        ['option_text' => 'Bercocok tanam', 'is_correct' => false],
        ['option_text' => 'Nomaden dan mengumpulkan makanan', 'is_correct' => true],
        ['option_text' => 'Membangun candi', 'is_correct' => false],
        ['option_text' => 'Menguasai teknik pande besi', 'is_correct' => false],
    ]);

    $q8 = $quiz->questions()->create([
        'question_text' => 'Zaman logam di Indonesia ditandai dengan penggunaan peralatan dari?'
    ]);

    $q8->options()->createMany([
        ['option_text' => 'Batu dihaluskan', 'is_correct' => false],
        ['option_text' => 'Batu serpih', 'is_correct' => false],
        ['option_text' => 'Perunggu dan besi', 'is_correct' => true],
        ['option_text' => 'Tanah liat', 'is_correct' => false],
    ]);

    $q9 = $quiz->questions()->create([
        'question_text' => 'Tradisi mendirikan bangunan batu besar seperti dolmen dan menhir termasuk dalam kebudayaan?'
    ]);

    $q9->options()->createMany([
        ['option_text' => 'Megalitikum', 'is_correct' => true],
        ['option_text' => 'Mesolitikum', 'is_correct' => false],
        ['option_text' => 'Paleolitikum', 'is_correct' => false],
        ['option_text' => 'Neolitikum', 'is_correct' => false],
    ]);

    $q10 = $quiz->questions()->create([
        'question_text' => 'Salah satu alat dari zaman Neolitikum yang terkenal adalah?'
    ]);

    $q10->options()->createMany([
        ['option_text' => 'Kapak perimbas', 'is_correct' => false],
        ['option_text' => 'Kapak genggam', 'is_correct' => false],
        ['option_text' => 'Kapak lonjong dan persegi', 'is_correct' => true],
        ['option_text' => 'Alat serpih', 'is_correct' => false],
    ]);


        //quiz 2
       $quiz = Quiz::create([
            'title' => 'Sejarah Indonesia',
            'description' => 'Kuis sejarah Indonesia 1945',
            'thumbnail' => 'sejarah.jpg',
        ]);

        // q1
        $q1 = $quiz->questions()->create([
            'question_text' => 'Kapan UUD 1945 diresmikan?'
        ]);

        $q1->options()->createMany([
            ['option_text' => '17 Agustus 1945', 'is_correct'=> false],
            ['option_text' => '18 Agustus 1945', 'is_correct' => true],
            ['option_text' => '17 Agustus 1949', 'is_correct' => false],
            ['option_text' => '28 Oktober 1928', 'is_correct' => false],
        ]);

        // q2
        $q2 = $quiz->questions()->create([
            'question_text' => 'Siapakah tokoh yang mengetuk palu saat mengesahkan UUD 1945?'
        ]);

        $q2->options()->createMany([
            ['option_text' => 'Ir. Soekarno', 'is_correct' => false],
            ['option_text' => 'Drs. Moh. Hatta', 'is_correct' => false],
            ['option_text' => 'Dr. Radjiman Wedyodiningrat', 'is_correct' => false],
            ['option_text' => 'Mr. Ahmad Subardjo', 'is_correct' => true],
        ]);

        // q3
        $q3 = $quiz->questions()->create([
            'question_text' => 'Nama BPUPKI diganti menjadi PPKI pada tanggal?'
        ]);

        $q3->options()->createMany([
            ['option_text' => '29 April 1945', 'is_correct' => false],
            ['option_text' => '22 Juni 1945', 'is_correct' => false],
            ['option_text' => '7 Agustus 1945', 'is_correct' => true],
            ['option_text' => '18 Agustus 1945', 'is_correct' => false],
        ]);

        // q4
        $q4 = $quiz->questions()->create([
            'question_text' => 'Naskah proklamasi diketik oleh?'
        ]);

        $q4->options()->createMany([
            ['option_text' => 'Fatmawati', 'is_correct' => false],
            ['option_text' => 'Sayuti Melik', 'is_correct' => true],
            ['option_text' => 'Soehok Gie', 'is_correct' => false],
            ['option_text' => 'Sutan Sjahrir', 'is_correct' => false],
        ]);

        // q5
        $q5 = $quiz->questions()->create([
            'question_text' => 'Piagam Jakarta dirumuskan pada tanggal?'
        ]);

        $q5->options()->createMany([
            ['option_text' => '1 Juni 1945', 'is_correct' => false],
            ['option_text' => '22 Juni 1945', 'is_correct' => true],
            ['option_text' => '17 Agustus 1945', 'is_correct' => false],
            ['option_text' => '18 Agustus 1945', 'is_correct' => false],
        ]);

        // q6
        $q6 = $quiz->questions()->create([
            'question_text' => 'Apa hasil sidang PPKI pada tanggal 18 Agustus 1945?'
        ]);

        $q6->options()->createMany([
            ['option_text' => 'Mengesahkan proklamasi', 'is_correct' => false],
            ['option_text' => 'Mengesahkan UUD 1945', 'is_correct' => true],
            ['option_text' => 'Menetapkan lagu Indonesia Raya', 'is_correct' => false],
            ['option_text' => 'Menetapkan pemilu pertama', 'is_correct' => false],
        ]);

        // q7
        $q7 = $quiz->questions()->create([
            'question_text' => 'Siapa yang diangkat sebagai presiden pertama Republik Indonesia?'
        ]);

        $q7->options()->createMany([
            ['option_text' => 'Jenderal Sudirman', 'is_correct' => false],
            ['option_text' => 'Drs. Moh. Hatta', 'is_correct' => false],
            ['option_text' => 'Ir. Soekarno', 'is_correct' => true],
            ['option_text' => 'Ahmad Dahlan', 'is_correct' => false],
        ]);

        // q8
        $q8 = $quiz->questions()->create([
            'question_text' => 'BPUPKI bertugas untuk?'
        ]);

        $q8->options()->createMany([
            ['option_text' => 'Menyiapkan konsep dasar negara dan UUD', 'is_correct' => true],
            ['option_text' => 'Melaksanakan proklamasi', 'is_correct' => false],
            ['option_text' => 'Mengatur sistem ekonomi Indonesia', 'is_correct' => false],
            ['option_text' => 'Membentuk kabinet pertama', 'is_correct' => false],
        ]);

        // q9
        $q9 = $quiz->questions()->create([
            'question_text' => 'Apa nama sidang yang menghasilkan rumusan dasar negara oleh Soekarno?'
        ]);

        $q9->options()->createMany([
            ['option_text' => 'Sidang PPKI', 'is_correct' => false],
            ['option_text' => 'Sidang BPUPKI pertama', 'is_correct' => true],
            ['option_text' => 'Sidang Panitia Sembilan', 'is_correct' => false],
            ['option_text' => 'Sidang KNIP', 'is_correct' => false],
        ]);

        // q10
        $q10 = $quiz->questions()->create([
            'question_text' => 'Lembaga yang pertama kali merumuskan dasar negara Indonesia adalah?'
        ]);

        $q10->options()->createMany([
            ['option_text' => 'PPKI', 'is_correct' => false],
            ['option_text' => 'MPR', 'is_correct' => false],
            ['option_text' => 'Panitia Sembilan', 'is_correct' => true],
            ['option_text' => 'DPR', 'is_correct' => false],
        ]);


        $quiz = Quiz::create([
            'title' => 'Persamaan Linear Dua Variabel',
            'description' => 'Matematika Wajib',
            'thumbnail' => 'math.jpeg',
        ]);

        $quiz = Quiz::create([
            'title' => 'Hukum Gerak Newton',
            'description' => 'Fisika',
            'thumbnail' => 'physics.jpeg',
        ]);

        $quiz = Quiz::create([
            'title' => 'Termokimia',
            'description' => 'Kimia',
            'thumbnail' => 'chemistry.jpg',
        ]);



    }
}

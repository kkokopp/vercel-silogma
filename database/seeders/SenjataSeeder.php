<?php

namespace Database\Seeders;

use App\Models\Senjata;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SenjataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kode_senjata = Str::uuid();
        Senjata::create([
            'kode_senjata' => $kode_senjata,
            'nama_senjata' => 'AK-47',
            'jenis_senjata_id' => 3,
            'seri_senjata' => 10,
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi eum quasi sapiente blanditiis culpa veniam voluptates itaque accusamus, delectus est reiciendis ad? Optio beatae eveniet nostrum rem provident ut id eos officia incidunt inventore voluptatibus minus iusto eligendi maiores, reiciendis aliquam nam vitae et quam libero perferendis. Quisquam ab error quaerat repudiandae? Obcaecati, totam voluptatibus quasi dolore explicabo tempora, quas est rerum nesciunt aliquam nisi quis sit ducimus quo tempore cupiditate nam hic quisquam odit mollitia in dolorem. Omnis earum maiores laborum velit voluptatem atque inventore illum, error beatae alias saepe delectus enim non eum sequi, commodi repellendus consectetur ad quas perferendis ipsum? Reprehenderit, atque nisi neque hic vitae eum quae. Iure totam inventore accusantium fugiat rem. Alias, est enim. Quasi reprehenderit numquam eveniet culpa autem recusandae repellat. Recusandae eligendi esse molestias facere excepturi quis modi quam odio, ab perspiciatis explicabo dignissimos obcaecati at ratione eveniet quae et cumque id? Odio deleniti doloremque possimus aliquid ut dignissimos autem atque quaerat commodi alias eum eligendi porro accusantium voluptas, saepe repudiandae, in, cumque cupiditate? Veritatis, itaque. Perspiciatis suscipit dolorem, vitae illum eveniet, rem modi ad, dolorum eos rerum enim iusto natus nesciunt explicabo debitis tempora provident dignissimos? Accusamus dolor rem eos nam.',
            'lokasi' => 'lokasi',
            'lokasi' => 'lokasi',
            'jumlah' => 10,
            'status_senjata_id' => 1,
        ]);
        $kode_senjata = Str::uuid();
        Senjata::create([
            'kode_senjata' => $kode_senjata,
            'nama_senjata' => 'AK-47',
            'jenis_senjata_id' => 5,
            'seri_senjata' => 10,
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi eum quasi sapiente blanditiis culpa veniam voluptates itaque accusamus, delectus est reiciendis ad? Optio beatae eveniet nostrum rem provident ut id eos officia incidunt inventore voluptatibus minus iusto eligendi maiores, reiciendis aliquam nam vitae et quam libero perferendis. Quisquam ab error quaerat repudiandae? Obcaecati, totam voluptatibus quasi dolore explicabo tempora, quas est rerum nesciunt aliquam nisi quis sit ducimus quo tempore cupiditate nam hic quisquam odit mollitia in dolorem. Omnis earum maiores laborum velit voluptatem atque inventore illum, error beatae alias saepe delectus enim non eum sequi, commodi repellendus consectetur ad quas perferendis ipsum? Reprehenderit, atque nisi neque hic vitae eum quae. Iure totam inventore accusantium fugiat rem. Alias, est enim. Quasi reprehenderit numquam eveniet culpa autem recusandae repellat. Recusandae eligendi esse molestias facere excepturi quis modi quam odio, ab perspiciatis explicabo dignissimos obcaecati at ratione eveniet quae et cumque id? Odio deleniti doloremque possimus aliquid ut dignissimos autem atque quaerat commodi alias eum eligendi porro accusantium voluptas, saepe repudiandae, in, cumque cupiditate? Veritatis, itaque. Perspiciatis suscipit dolorem, vitae illum eveniet, rem modi ad, dolorum eos rerum enim iusto natus nesciunt explicabo debitis tempora provident dignissimos? Accusamus dolor rem eos nam.',
            'lokasi' => 'lokasi',
            'lokasi' => 'lokasi',
            'jumlah' => 10,
            'status_senjata_id' => 2,
        ]);
        $kode_senjata = Str::uuid();
        Senjata::create([
            'kode_senjata' => $kode_senjata,
            'nama_senjata' => 'AK-47',
            'jenis_senjata_id' => 5,
            'seri_senjata' => 10,
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi eum quasi sapiente blanditiis culpa veniam voluptates itaque accusamus, delectus est reiciendis ad? Optio beatae eveniet nostrum rem provident ut id eos officia incidunt inventore voluptatibus minus iusto eligendi maiores, reiciendis aliquam nam vitae et quam libero perferendis. Quisquam ab error quaerat repudiandae? Obcaecati, totam voluptatibus quasi dolore explicabo tempora, quas est rerum nesciunt aliquam nisi quis sit ducimus quo tempore cupiditate nam hic quisquam odit mollitia in dolorem. Omnis earum maiores laborum velit voluptatem atque inventore illum, error beatae alias saepe delectus enim non eum sequi, commodi repellendus consectetur ad quas perferendis ipsum? Reprehenderit, atque nisi neque hic vitae eum quae. Iure totam inventore accusantium fugiat rem. Alias, est enim. Quasi reprehenderit numquam eveniet culpa autem recusandae repellat. Recusandae eligendi esse molestias facere excepturi quis modi quam odio, ab perspiciatis explicabo dignissimos obcaecati at ratione eveniet quae et cumque id? Odio deleniti doloremque possimus aliquid ut dignissimos autem atque quaerat commodi alias eum eligendi porro accusantium voluptas, saepe repudiandae, in, cumque cupiditate? Veritatis, itaque. Perspiciatis suscipit dolorem, vitae illum eveniet, rem modi ad, dolorum eos rerum enim iusto natus nesciunt explicabo debitis tempora provident dignissimos? Accusamus dolor rem eos nam.',
            'lokasi' => 'lokasi',
            'lokasi' => 'lokasi',
            'jumlah' => 10,
            'status_senjata_id' => 1,
        ]);
        $kode_senjata = Str::uuid();
        Senjata::create([
            'kode_senjata' => $kode_senjata,
            'nama_senjata' => 'AK-47',
            'jenis_senjata_id' => 4,
            'seri_senjata' => 10,
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi eum quasi sapiente blanditiis culpa veniam voluptates itaque accusamus, delectus est reiciendis ad? Optio beatae eveniet nostrum rem provident ut id eos officia incidunt inventore voluptatibus minus iusto eligendi maiores, reiciendis aliquam nam vitae et quam libero perferendis. Quisquam ab error quaerat repudiandae? Obcaecati, totam voluptatibus quasi dolore explicabo tempora, quas est rerum nesciunt aliquam nisi quis sit ducimus quo tempore cupiditate nam hic quisquam odit mollitia in dolorem. Omnis earum maiores laborum velit voluptatem atque inventore illum, error beatae alias saepe delectus enim non eum sequi, commodi repellendus consectetur ad quas perferendis ipsum? Reprehenderit, atque nisi neque hic vitae eum quae. Iure totam inventore accusantium fugiat rem. Alias, est enim. Quasi reprehenderit numquam eveniet culpa autem recusandae repellat. Recusandae eligendi esse molestias facere excepturi quis modi quam odio, ab perspiciatis explicabo dignissimos obcaecati at ratione eveniet quae et cumque id? Odio deleniti doloremque possimus aliquid ut dignissimos autem atque quaerat commodi alias eum eligendi porro accusantium voluptas, saepe repudiandae, in, cumque cupiditate? Veritatis, itaque. Perspiciatis suscipit dolorem, vitae illum eveniet, rem modi ad, dolorum eos rerum enim iusto natus nesciunt explicabo debitis tempora provident dignissimos? Accusamus dolor rem eos nam.',
            'lokasi' => 'lokasi',
            'lokasi' => 'lokasi',
            'jumlah' => 10,
            'status_senjata_id' => 3,
        ]);
        $kode_senjata = Str::uuid();
        Senjata::create([
            'kode_senjata' => $kode_senjata,
            'nama_senjata' => 'AK-47',
            'jenis_senjata_id' => 6,
            'seri_senjata' => 10,
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi eum quasi sapiente blanditiis culpa veniam voluptates itaque accusamus, delectus est reiciendis ad? Optio beatae eveniet nostrum rem provident ut id eos officia incidunt inventore voluptatibus minus iusto eligendi maiores, reiciendis aliquam nam vitae et quam libero perferendis. Quisquam ab error quaerat repudiandae? Obcaecati, totam voluptatibus quasi dolore explicabo tempora, quas est rerum nesciunt aliquam nisi quis sit ducimus quo tempore cupiditate nam hic quisquam odit mollitia in dolorem. Omnis earum maiores laborum velit voluptatem atque inventore illum, error beatae alias saepe delectus enim non eum sequi, commodi repellendus consectetur ad quas perferendis ipsum? Reprehenderit, atque nisi neque hic vitae eum quae. Iure totam inventore accusantium fugiat rem. Alias, est enim. Quasi reprehenderit numquam eveniet culpa autem recusandae repellat. Recusandae eligendi esse molestias facere excepturi quis modi quam odio, ab perspiciatis explicabo dignissimos obcaecati at ratione eveniet quae et cumque id? Odio deleniti doloremque possimus aliquid ut dignissimos autem atque quaerat commodi alias eum eligendi porro accusantium voluptas, saepe repudiandae, in, cumque cupiditate? Veritatis, itaque. Perspiciatis suscipit dolorem, vitae illum eveniet, rem modi ad, dolorum eos rerum enim iusto natus nesciunt explicabo debitis tempora provident dignissimos? Accusamus dolor rem eos nam.',
            'lokasi' => 'lokasi',
            'lokasi' => 'lokasi',
            'jumlah' => 10,
            'status_senjata_id' => 2,
        ]);
    }
}

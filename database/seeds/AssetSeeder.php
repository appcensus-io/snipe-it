<?php
use Illuminate\Database\Seeder;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;

class AssetSeeder extends Seeder
{
  public function run()
  {
      Asset::truncate();
      factory(Asset::class, 1000)->states('laptop-mbp')->create();
      factory(Asset::class, 50)->states('laptop-mbp-pending')->create();
      factory(Asset::class, 50)->states('laptop-mbp-archived')->create();
      factory(Asset::class, 50)->states('laptop-air')->create();
      factory(Asset::class, 5)->states('laptop-surface')->create();
      factory(Asset::class, 5)->states('laptop-xps')->create();
      factory(Asset::class, 5)->states('laptop-spectre')->create();
      factory(Asset::class, 5)->states('laptop-zenbook')->create();
      factory(Asset::class, 3)->states('laptop-yoga')->create();

      factory(Asset::class, 30)->states('desktop-macpro')->create();
      factory(Asset::class, 30)->states('desktop-lenovo-i5')->create();
      factory(Asset::class, 30)->states('desktop-optiplex')->create();

      factory(Asset::class, 5)->states('conf-polycom')->create();
      factory(Asset::class, 2)->states('conf-polycomcx')->create();

      factory(Asset::class, 12)->states('tablet-ipad')->create();
      factory(Asset::class, 4)->states('tablet-tab3')->create();

      factory(Asset::class, 27)->states('phone-iphone6s')->create();
      factory(Asset::class, 40)->states('phone-iphone7')->create();

      factory(Asset::class, 10)->states('ultrafine')->create();
      factory(Asset::class, 10)->states('ultrasharp')->create();


      $del_files = Storage::files('companies');
      foreach($del_files as $del_file){ // iterate files
          \Log::debug('Deleting: '.$del_files);
          try  {
              Storage::delete('assets'.'/'.$del_files);
          } catch (\Exception $e) {
              \Log::debug($e);
          }
      }

      DB::table('checkout_requests')->truncate();

  }
}

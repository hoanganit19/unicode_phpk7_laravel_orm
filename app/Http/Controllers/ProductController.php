<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Phone;

use App\Models\Group;

use App\Models\Mechanic;

use App\Models\Owner;

use App\Models\Province;

use App\Models\Category;

use App\Models\Post;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        $product = Product::find(1);

        //$productsActive = Product::where('status', 1)->first();


        $productsActive = $products->reject(function($product){
            return $product->status == 0;
        });

        //dd($productsActive);

//        Product::chunk(2, function($products){
//             foreach ($products as $product){
//                 echo $product->name.'<br/>';
//             }
//        });

//        foreach (Product::where('status', 1)->cursor() as $product){
//            echo $product->name.'<br/>';
//        }

        $data = [
            'name' => 'Test sản phẩm',
            'price' => 12000
        ];

        //$status = Product::create($data);

        //$status = Product::insert($data);

//        $status = Product::firstOrCreate([
//            'name' => 'Sản phẩm 4'
//        ], [
//            'name' => 'Sản phẩm 4 new',
//            'price' => 15000
//        ]);
//
//        dd($status);

//        $product = new Product();
//
//        $product->name = 'Sản phẩm 6';
//        $product->price = 20000;
//        $product->save();

          $product = Product::find(1);

         // $product->name = 'Sản phẩm 1 - Update';

         // $product->save();

//          $product->update([
//              'name' => 'Sản phẩm 1 - New',
//              'price' => 200000
//          ]);

//        Product::updateOrCreate([
//            'id' => 10
//        ], [
//            'name' => 'Test sản phẩm - Update',
//            'price' => 100000
//        ]);

        //Product::destroy(3);

//        $products = Product::onlyTrashed()->get();
//
//        dd($products);

         //Product::withTrashed()->find(2)->restore();

        //Product::withTrashed()->find(3)->forceDelete();
    }

    public function relation(){
        $user = User::find(1);
        $phone = $user->phone;
        $phoneNumber = $phone->phone;
        echo $phoneNumber.'<br/>';

        //Tìm thông tin user theo số điện thoại
        $phoneNumber = '0388875179';

        //$phone = Phone::where('phone', $phoneNumber)->first();

        $phone = Phone::wherePhone($phoneNumber)->first();

        //$phone = Phone::whereId(2)->first();

        //dd($phone);

//        $user = $phone->user;
//
//        $name = $user->name;
//
//        $email = $user->email;
//
//        echo $name.'<br/>';
//        echo $email.'<br/>';

//          $group = Group::find(1);
//          $users = $group->users;
//
//          dd($users);

//            $user = User::find(1);
//
//            $group = $user->group;
//
//            $groupName = $group->name;
//
//            echo $groupName;

//           $users = User::all(); //trả về collection
//
//           foreach ($users as $user){
//                //$user => instance
//
//                echo $user->name.' - '.$user->group->name.'<br/>';
//           }

//            $mechanic = Mechanic::whereName('Phụ tùng 1')->first();
//
//            $owner = $mechanic->carOwner;
//
//            dd($owner);

//            $owner = Owner::find(2);
//
//            dd($owner->car->mechanic);
//
//            $province = Province::whereName('Hồ Chí Minh')->first();
//
//            $posts = $province->posts()->whereStatus(1)->get();
//
//            foreach ($posts as $post){
//                echo $post->title.'<br/>';
//            }

//            $users = $province->users;
//
//            foreach ($users as $user){
//                $posts = $user->posts;
//
//                foreach ($posts as $post){
//                    echo $post->title.'<br/>';
//                }
//            }
//
            $category = Category::find(2);

//            foreach ($category->posts as $post){
//                $date = $post->times->created_at;
//                echo $post->title.'<br/>';
//                echo $date.'<br/>';
//            }

//            $post = Post::find(2);
//
//            dd($post->categories);

//          $users = User::all();
//          foreach ($users as $user){
//              echo $user->name.' - '.$user->phone->phone.'<br/>';
//          }

//        $userHasPost = User::has('posts', '>=', 2)->get();
//
//        dd($userHasPost);

//          $users = User::whereHas('posts', function($query){
//              $query->whereStatus(0);
//          })->get();

          //$users = User::doesntHave('posts')->get();

//          $users = User::withCount(['group as nhom', 'posts' => function($query){
//               $query->whereStatus(1);
//          }])->get();
//
//          dd($users);

       // DB::enableQueryLog();;
//        $users = User::with(['group' => function($query){
//            $query->whereId(1);
//        }, 'phone'])->get();

//        $users = User::all();
//
//        foreach ($users as $user){
//            echo $user->group?$user->group->name:'No'.'<br/>';
//            //echo $user->phone->phone.'<br/>';
//        }

//        $users = User::all();
//        $users->load('group');
//
//        foreach ($users as $user){
//            echo $user->group?$user->group->name:'No'.'<br/>';
//            //echo $user->phone->phone.'<br/>';
//        }

//        $sql = DB::getQueryLog();
//
//        dd($sql);

        $user = User::find(1);

//        $post = new Post([
//            'title' => 'Test bài viết'
//        ]);

//        $user->posts()->saveMany([
//            new Post(['title' => 'Test bài viết 1']),
//            new Post(['title' => 'Test bài viết 2']),
//            new Post(['title' => 'Test bài viết 3']),
//        ]);

        $user->posts()->create([
            'title' => 'Bài viết 4'
        ]);

        $user->posts()->create([
            'title' => 'Bài viết 5'
        ]);

        $user->posts()->create([
            'title' => 'Bài viết 6'
        ]);

    }
}









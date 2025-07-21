<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

header('Catche-Control:no-Catch,no-store'); // logout 




class TaskController extends Controller
{   
    //View Index Page
    public function Index_View()
    {   
        $tasks = TaskModel::with('user')->get(); // Eloquent Joining Tables 
         //dd($tasks);
        return view('IndexBlog')->with('Indexdata',$tasks);
    }

    //Single Blog View
    public function Blog_single($id)
    {   $data = TaskModel::with('user')->where('id',$id)->first();
   // dd($data);
                $word2 = str_word_count($data->desc);
                // echo  $word2;
                // die;

        return view('SingleBlog')->with('Blogdata',$data);
    }

    //View Login Page
    public function Login_View(){
        return view('Login');
    }
    // Login check Function
    public function Login(Request $req)
    {     
        // dd($req->all()); 
        $req->validate([ 'email' => "required|email",
                        'password' => "required|min:3|max:10"]);
        $user_email = $req->input('email');
        $pass = md5($req->input('password'));
       
        // dd($req->all());
        // echo $pass2;
        //  die;
        $fetch_data = User::where('email',$user_email)->where('password',$pass)->first();
        $req->session()->put('user_id',$fetch_data->id);
        $req->session()->put('name',$fetch_data->name);
        $req->session()->put('role',$fetch_data->role);
        $user_type= $fetch_data->role;
        // dd($fetch_data->role);

        if(isset($fetch_data)){
            // echo "<script>alert('Login Sucess: $name')</script>";
            return redirect('/Display_rout')->with('Message','Login Sucess');
            // if($user_type==="admin"){
            //     return redirect('/Display_rout')->with('Message','Login Sucess');
            // }elseif($user_type==="user"){
            //     return redirect('/Display_rout')->with('Message','Login Sucess');
            // }else{
            //     exit();
            // }
        }
    }

    // Logout Function
    public function Logout(Request $req)
    {     
        //return $req;
          $req->session()->flush();
          $req->session()->forget('user_id');
          return redirect()->route('userlog')->with('Message', "Logged Out successfully!"); // redirect to login page by name() 
    }

    //View User Reg page
    public function Reg_View(){
        return view('Regindex');
    }

    //Reg Data Insert
    public function Reg_Insert(Request $req)
    {   
        $req->validate([
            'name' => 'required|regex:/^[A-Za-z ]{3,30}$/',
            'email' => 'required|email|unique:users,email',
            'password'  => [
                'required',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*\-]).{8,}$/'
            ],
            'confirmPassword' => 'required|same:password',
            'terms' => 'accepted'
        ]);

        $name = $req->input('name');
        $email = $req->input('email');
        $pass = $req->input('password');

        // Create new User instance (using predefined Laravel users table)
        $obj = new User();
        $obj->name = $name;
        $obj->email = $email;
        $obj->password = md5($pass); // Always hash the password
        $obj->save(); // Save to DB
        // if user is registered then primary key--->  
        if ($obj->id) {  // id will be generated soo if id is present then reg is sucess
            echo "<script>alert('User Registered Successfully');</script>";
            
        } else {
            echo "<script>alert('Registration Failed. Please Try Again.');</script>";
        }
    }

    // View Add Blog page
    public function Blog_View(){
        return view('BlogAdd');
    }

    // Blog Data Insert
    public function Insert_Blog(Request $req){
        // return view('Blogindex');
        $user_id = session()->get('user_id');
        $req->validate([
        'image' => 'required|mimes:jpeg,jpg,png|max:4096',
        'title' => 'required|regex:/^[A-Za-z ]{3,30}$/',
        'desc'  => 'required|string|min:8|max:200',
    ]);

        $title = $req->input('title');
        $desc = $req->input('desc');
        $file = $req->file('image');

        $filename= uniqid()."_".$file->getClientOriginalName();
        $image_path = './uploads';
        $file->move($image_path,$filename);

        // dd($req->all());
        // die;

        // we have to create a obj of new model so that we can perform data manipulation
        $obj = new Taskmodel();
       // inserting data into table column 
        $obj->user_id = $user_id;
        $obj->image = $image_path."/".$filename;
        $obj->title = $title;
        $obj->desc = $desc;
        $obj->save(); // if we dont do this data will not be inserted to database 
        if($obj->save()){
            // echo "<script>alert('Blog Added ')</script>";
         return redirect('/Display_rout')->with('Message','Blog Added'); 
        }
    }

    public function Display_View()
    {   
        $user_id = session()->get('user_id');
        // echo "$user_id";
        $fetch_data = Taskmodel::where('user_id',$user_id)->get();
        // $fetch_data = taskmodel::all(); // get all data
        return view('Blogdisplay')->with(['Blogdata'=> $fetch_data]);
    }

    public function Delete($id)
    {   
        
        // Check if the record exists before attempting to delete
        $task = TaskModel::find($id);
        
        if (!$task) {
            echo "<script>alert('Record not found!');</script>";
            return;
        }
        // echo $id;
        // die;
        $delete = TaskModel::where('id',$id)->delete();
        if($delete){
            // echo "<script>alert('Blog Deleted')</script>";
            return back()->with('Message','Blog Deleted');  // return back to prevoius page
        }
    }

    public function Edit($id)
    {
        $data = TaskModel::where('id',$id)->get();
        if($data){
            return view('EditBlog')->with(['Blogdata' =>$data]);
        }
    }
    public function Update(Request $req)
    {    
         $req->validate([
        'BlogID' => 'required|numeric',    
        'image' => 'required|mimes:jpeg,jpg,png|max:4096',
        'title' => 'required|regex:/^[A-Za-z ]{3,30}$/',
        'desc'  => 'required|string|min:8|max:200',
        ]);

        $blogid = $req->input('BlogID');
        $image = $req->input('image');
        $title = $req->input('title');
        $desc = $req->input('desc');

      

        if($data){
            return view('EditBlog')->with(['Blogdata' =>$data]);
        }
    }
}

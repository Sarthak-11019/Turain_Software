<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 40px;
            backdrop-filter: blur(10px);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .header p {
            color: #777;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .auth-buttons {
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            gap: 10px;
        }

        .auth-btn {
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .login-btn {
            background: transparent;
            color: #2575fc;
            border: 2px solid #2575fc;
        }

        .register-btn {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            border: 2px solid transparent;
        }

        .auth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .create-btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .create-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .blog-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .blog-desc {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            color: #888;
            font-size: 0.9rem;
            padding-top: 15px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }

        .blog-actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .read-btn {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
        }

        .category-btn {
            background: #f0f0f0;
            color: #555;
            padding: 5px 10px;
            font-size: 0.8rem;
            margin-bottom: 10px;
            align-self: flex-start;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .no-blogs {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            grid-column: 1 / -1;
        }

        .no-blogs i {
            font-size: 3rem;
            color: #2575fc;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            color: white;
            font-weight: 500;
            text-align: center;
        }

        .alert-success {
            background: linear-gradient(to right, #2ecc71, #27ae60);
        }

        .search-bar {
            display: flex;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-bar input {
            flex: 1;
            padding: 12px 20px;
            border: 1px solid #ddd;
            border-radius: 10px 0 0 10px;
            font-size: 1rem;
            outline: none;
        }

        .search-bar button {
            padding: 12px 20px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            border: none;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-bar button:hover {
            background: linear-gradient(to right, #1a68e6, #5a0cb8);
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .auth-buttons {
                position: static;
                justify-content: center;
                margin-bottom: 20px;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <div class="auth-buttons">
            @if(!session('user_id'))
                <a href="{{route('userlog')}}" class="auth-btn login-btn">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="{{route('reg')}}" class="auth-btn register-btn">
                    <i class="fas fa-user-plus"></i> Register
                </a>  
            @endif    

            </div>
            <h1>Tech Insights</h1>
            <p>Discover the latest articles on web development, programming, and technology trends</p>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search blog posts...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
@if(session('user_id')) <!--If user is logged in-->
        <a href="{{route('blog')}}" class="create-btn">
            <i class="fas fa-plus-circle"></i> Create New Post
        </a>
@endif

@if(isset($Indexdata))

 @foreach($Indexdata as $data)
        <div class="blog-grid">
            <div class="blog-card">
                <img src="{{$data->image}}" class="blog-image" alt="JavaScript">
                <div class="blog-content">
                    <span class="action-btn category-btn"> {{$data->user->name}} </span>     
                    <h3 class="blog-title">{{$data->title}}</h3>
                    <p class="blog-desc">{{$data->desc}}</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar-alt"></i> {{ $data->created_at->format('M d, Y') }} </span>
                        <span><i class="far fa-eye"></i> 1.2K views</span>
                    </div> 
                    <div class="blog-actions">
                        <a href="{{route('singleblog',['id' => $data->id])}}" class="action-btn read-btn">
                            <i class="fas fa-book-open"></i> Read More
                        </a>
                    </div>
                </div>
            </div>
@endforeach
            {{-- <div class="blog-card">
                <img src="https://source.unsplash.com/random/600x400/?react" class="blog-image" alt="React">
                <div class="blog-content">
                    <span class="action-btn category-btn">React</span>
                    <h3 class="blog-title">React Hooks: Revolutionizing Functional Components</h3>
                    <p class="blog-desc">Learn how React Hooks have transformed the way we write components, making state management and side effects easier in functional components.</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar-alt"></i> May 28, 2023</span>
                        <span><i class="far fa-eye"></i> 2.4K views</span>
                    </div>
                    <div class="blog-actions">
                        <a href="/post/2" class="action-btn read-btn">
                            <i class="fas fa-book-open"></i> Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://source.unsplash.com/random/600x400/?nodejs" class="blog-image" alt="Node.js">
                <div class="blog-content">
                    <span class="action-btn category-btn">Backend</span>
                    <h3 class="blog-title">Building Scalable APIs with Node.js and Express</h3>
                    <p class="blog-desc">A comprehensive guide to creating robust RESTful APIs using Node.js and Express, covering best practices for performance and security.</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar-alt"></i> April 15, 2023</span>
                        <span><i class="far fa-eye"></i> 1.8K views</span>
                    </div>
                    <div class="blog-actions">
                        <a href="/post/3" class="action-btn read-btn">
                            <i class="fas fa-book-open"></i> Read More
                        </a>
                    </div>
                </div>
            </div> --}}
@endif            
        </div>
    </div>
</body>
</html>
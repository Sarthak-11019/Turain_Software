<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastering ES6 Features | Tech Insights</title>
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

        .back-btn {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px 20px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-50%) translateX(-5px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .blog-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .blog-content {
            line-height: 1.8;
            color: #444;
        }

        .blog-content h2 {
            color: #2575fc;
            margin: 25px 0 15px;
        }

        .blog-content p {
            margin-bottom: 15px;
        }

        .blog-content ul, .blog-content ol {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .blog-content li {
            margin-bottom: 8px;
        }

        .blog-content code {
            background: #f0f0f0;
            padding: 2px 5px;
            border-radius: 4px;
            font-family: monospace;
        }

        .blog-content pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 20px 0;
        }

        .blog-tags {
            display: flex;
            gap: 10px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .tag {
            background: #f0f0f0;
            color: #555;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-details h4 {
            margin-bottom: 5px;
            color: #333;
        }

        .author-details p {
            color: #777;
            font-size: 0.9rem;
        }

        .social-share {
            display: flex;
            gap: 15px;
            margin: 30px 0;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        .facebook {
            background: #3b5998;
        }

        .twitter {
            background: #1da1f2;
        }

        .linkedin {
            background: #0077b5;
        }

        .comments-section {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .comments-section h3 {
            margin-bottom: 20px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 15px;
            min-height: 120px;
        }

        .comment-form button {
            padding: 12px 25px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .back-btn {
                position: static;
                transform: none;
                margin-bottom: 20px;
                display: inline-block;
            }
            
            .blog-image {
                height: 250px;
            }
        }
    </style>
</head>
<body>
@if(isset($Blogdata))  

{{-- @php dd($Blogdata->image) @endphp --}}



    <div class="container">
        <div class="header">
            <a href="{{route('index')}}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a><br>
            <h1>Mastering ES6 Features in Modern JavaScript</h1>
            <div class="blog-meta">
                <span><i class="far fa-user"></i> By {{$Blogdata->user->name}}</span>
                <span><i class="far fa-calendar-alt"></i> Published on: {{$Blogdata->created_at->format('M d, Y')}}</span>
                <span><i class="far fa-eye"></i> 1.2K views</span>
            </div>
        </div>

        <img src="{{ asset(str_replace('./', '', $Blogdata->image)) }}" class="blog-image" alt="Blog Image" width="100px"> 
        <div class="blog-content">
         

            <h2>{{$Blogdata->title}}</h2>
            @php
                $words = explode(' ', $Blogdata->desc);  // in db text is in string type
                $shortDesc = implode(' ', array_slice($words, 0, 100)) . '.....';
                // $words = string_word_count($Blogdata->desc);
                // $show_content = ($words > 100) ?  
            @endphp
            {{-- <p>{{$shortDesc}}</p> --}} <p>  </p>
            
            {{-- <pre><code>// Traditional function
function add(a, b) {
    return a + b;
}

// Arrow function
const add = (a, b) => a + b;</code></pre>

            <h2>Template Literals</h2>
            <p>Template literals provide an easy way to create multiline strings and perform string interpolation.</p>
            
            <pre><code>const name = 'John';
const greeting = `Hello ${name},
Welcome to our website!`;</code></pre>

            <h2>Destructuring Assignment</h2>
            <p>Destructuring allows you to unpack values from arrays or properties from objects into distinct variables.</p>
            
            <pre><code>// Array destructuring
const [first, second] = [1, 2];

// Object destructuring
const { name, age } = { name: 'Alice', age: 30 };</code></pre>

            <h2>Default Parameters</h2>
            <p>ES6 allows function parameters to have default values when no value or undefined is passed.</p>
            
            <pre><code>function greet(name = 'Guest') {
    return `Hello ${name}!`;
}</code></pre>

            <h2>Rest and Spread Operators</h2>
            <p>The rest parameter syntax allows us to represent an indefinite number of arguments as an array, while the spread operator allows an iterable to expand in places where multiple arguments are expected.</p>
            
            <pre><code>// Rest operator
function sum(...numbers) {
    return numbers.reduce((a, b) => a + b);
}

// Spread operator
const arr1 = [1, 2, 3];
const arr2 = [...arr1, 4, 5]; // [1, 2, 3, 4, 5]</code></pre>

            <h2>Classes</h2>
            <p>ES6 introduced class syntax, providing a cleaner way to create objects and deal with inheritance.</p>
            
            <pre><code>class Person {
    constructor(name) {
        this.name = name;
    }
    
    greet() {
        return `Hello, my name is ${this.name}`;
    }
}</code></pre>

            <div class="blog-tags">
                <span class="tag">JavaScript</span>
                <span class="tag">ES6</span>
                <span class="tag">Web Development</span>
                <span class="tag">Frontend</span>
            </div>

            <div class="social-share">
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-btn linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <div class="author-info">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="author-avatar">
                <div class="author-details">
                    <h4>Sarah Johnson</h4>
                    <p>Senior JavaScript Developer with 8 years of experience building web applications. Passionate about teaching and sharing knowledge with the developer community.</p>
                </div>
            </div>

            <div class="comments-section">
                <h3><i class="far fa-comments"></i> Comments (3)</h3>
                
                <div class="comment-form">
                    <h4>Leave a comment</h4>
                    <textarea placeholder="Share your thoughts..."></textarea>
                    <button type="submit">Post Comment</button>
                </div>
            </div>
        </div>
    </div> --}}
@endif    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Blog Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }

        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: #2ecc71;
            color: white;
        }

        .alert-info {
            background-color: #3498db;
            color: white;
        }

        .btn-primary {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(37, 117, 252, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .blog-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .blog-content {
            padding: 20px;
        }

        .blog-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .blog-desc {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            color: #888;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
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
            transition: all 0.3s ease;
        }

        .edit-btn {
            background: linear-gradient(to right, #2ecc71, #27ae60);
            color: white;
            border: none;
        }

        .delete-btn {
            background: linear-gradient(to right, #e74c3c, #c0392b);
            color: white;
            border: none;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .no-blogs i {
            font-size: 3rem;
            color: #2575fc;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .blog-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

@if(isset($Blogdata))
    <div class="container">
        <div class="header">
            <h1>Task Blog Posts</h1>
        </div>

        @if(session('Message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-6">
                <a href="{{ route('blog') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Add New Blog Post
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($Blogdata as $data)
            <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                    <img src="{{ $data->image }}" class="blog-image" alt="blog image">
                    <div class="blog-content">
                        <h3 class="blog-title">{{ $data->title }}</h3>
                        <p class="blog-desc">{{ $data->desc }}</p>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar-alt me-1"></i> {{ $data->created_at->format('M d, Y') }}</span>
                            <span><i class="fas fa-sync-alt me-1"></i> {{ $data->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="blog-actions">
                            <a href="#" class="action-btn edit-btn">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <a href="#" class="action-btn delete-btn">
                                <i class="fas fa-trash-alt me-1"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($Blogdata) == 0)
            <div class="col-12">
                <div class="no-blogs">
                    <i class="far fa-newspaper"></i>
                    <h3>No blog posts found</h3>
                    <p>Get started by creating your first blog post</p>
                    <a href="{{ route('blog') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus-circle me-2"></i>Create Blog Post
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
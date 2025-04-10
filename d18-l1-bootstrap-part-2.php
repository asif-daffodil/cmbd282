<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .imranMacbook {
            color: teal;
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark col-12">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div id="carouselExample" class="carousel slide col-12">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./slider/slide1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./slider/slide2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./slider/slide3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 imranMacbook p-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe magni vitae maiores molestias corporis,
                voluptates aspernatur esse aut. Quaerat exercitationem adipisci repudiandae voluptates ducimus vitae
                expedita cumque obcaecati accusamus, pariatur odit ut aliquid labore dolores iure doloremque nesciunt
                quod accusantium deserunt? Corrupti soluta facilis deleniti fuga sint aspernatur numquam dolor
                temporibus ea fugit. Vero eveniet quo iusto deleniti officia consequuntur?
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center display-4 py-4">
                Our Branches
            </div>
            <div class="col-12">
                <table class="table table-dark table-striped table-hover table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dhaka</td>
                        <td>Uttara</td>
                        <td>01712345678</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Chittagong</td>
                        <td>Chawkbazar</td>
                        <td>01812345678</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Sylhet</td>
                        <td>Shahjalal Uposhohor</td>
                        <td>01912345678</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Rajshahi</td>
                        <td>Boalia</td>
                        <td>01612345678</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-5 mx-auto my-4 border border-2 rounded pb-4 shadow">
                <div class="text-center display-4 py-4">
                    Contact Us
                </div>
                <form action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
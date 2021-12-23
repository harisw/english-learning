<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('/')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">English Learning</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">{{$video->title}}</h1>
                        <!-- <p class="lead fw-normal text-muted mb-0">Company portfolio</p> -->
                    </div>

                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8">
                                <iframe id="existing-iframe-example"
                                    width="720" height="540"
                                    src="{{$video->link}}"
                                    frameborder="0"
                                    style="border: solid 2px #37474F"
                            ></iframe>
                        </div>
                        <div class="col-lg-4 px-0">
                            <section class="bg-light" style="display: block; height: 260px;">
                                <div class="container overflow-auto" id="rightAnswer">

                                </div>
                            </section>
                            <section class="bg-secondary" style="display: block; height: 260px;">
                                <div class="container overflow-auto" id="optionAnswer" style="overflow-y: auto">

                                </div>
                            </section>
                        </div>
                        <div class="col-lg-8"></div>
                        <div class="col-lg-2">
                            <section>
                                <button class="btn btn-md btn-warning btn-skip mx-2 my-2">Skip question</button>
                            </section>
                        </div>
                        <div class="col-lg-2">
                            <section>
                                <button class="btn btn-sm btn-secondary btn-reveal mx-2 my-2">Reveal</button>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; English Learning 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('/')}}/js/scripts.js"></script>
        <script src="{{url('/')}}/js/jquery-3.6.0.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
             $(document).on('click','.btn-answer',function(){
                var index = $(this).data('answer');
                
                console.log($(this).text())
                console.log(answers[questionNum][currentIndex]);
                if(index == currentIndex){
                //if($(this).text() == answers[questionNum][currentIndex]){
                    console.log("benar");
                    $("#rightAnswer").append(`<button class="btn btn-md btn-primary mx-2 my-2">${$(this).text()}</button>`);
                    currentIndex++;
                    $(this).remove();
                    if(currentIndex == answers[questionNum].length){
                        $("#rightAnswer").empty();
                        questionNum++;
                        loadQuestion();
                        currentIndex = 0;
                        Swal.fire(
                          'Good job!',
                          "Let's go to the next question",
                          'success'
                        )
                    }
                } else {
                    Swal.fire(
                      'Try Again!',
                      'Wrong Answer, try another word option',
                      'error'
                    )
                }
             });

             $(document).on('click', '.btn-skip', function(){
                $("#rightAnswer").empty();
                questionNum++;
                loadQuestion();
                currentIndex = 0;
             });
              $(document).on('click', '.btn-reveal', function(){
                Swal.fire(`<sm>${questions[questionNum]}</sm>`);
             });
            var questions = [
                @foreach($questions as $q)
                    "{{$q->word_tokens}}",
                @endforeach
            ];
            var answers = [];
            var questionNum = 0;
            var currentIndex = 0;
            function shuffleArray(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }

            function loadQuestion(){
                $("#optionAnswer").empty();
                var words = questions[questionNum].split(' ');
                answers.push(words);
                var options = [];
                for (var i = 0; i < words.length; i++) {
                    options.push(`<button class="btn btn-md btn-primary btn-answer mx-2 my-2" data-answer="${i}">${words[i]}</button>`);
                }                
                shuffleArray(options);
                
                for (var i = 0; i < options.length; i++) {
                    $("#optionAnswer").append(options[i]);
                }
                console.log(answers)
            }
            $(document).ready(function(){
                loadQuestion();
            })
        </script>
    </body>
</html>

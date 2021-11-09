<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>Document</title>


</head>

<body>
    <div id="container">
        <header></header>
        <aside>
            <h6 class="text-center mt-4">Filtre de recherche</h6>
            <div class="aside-content mt-3">
              <!--  <form action="">
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <input name="ar" type="radio">
                        </div>
                        <div class="col-10">
                            Continent Afrique
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <input name="ar" type="radio">
                        </div>
                        <div class="col-10">
                            Continent Europe
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <input name="ar" type="radio">
                        </div>
                        <div class="col-10">
                            Continent Asie
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <input name="ar" type="radio">
                        </div>
                        <div class="col-10">
                            UEMOA
                        </div>
                    </div> 
                        <hr>      
                    <span id="ar" style="display: non;"> -->
                    <!--    <div class="row">
                            <div class="col-4"><label for="">Continents</label></div>
                            <div class="col-8">
                                 <select class="">
                                    <option selected>....</option>
                                    <option value="1">Afrique</option>
                                    <option value="2">Amérique</option>
                                    <option value="3">Antartique</option>
                                    <option value="4">Asie</option>
                                    <option value="5">Europe</option>
                                    <option value="6">Océanie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"><label for="">Regions</label></div>
                            <div class="col-8">
                                 <select class="">
                                    <option selected>...</option>
                                    <option value="1">Nord</option>
                                    <option value="2">Sud</option>
                                    <option value="3">Est</option>
                                    <option value="2">Ouest</option>
                                    <option value="3">Centre</option>
                                </select>
                            </div>
                        </div>
                        <hr>
               

                </form>-->
            </div>
        </aside>
        <main>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Données d'exportation</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Données d'importation</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">Ballance commerciale</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div >
                        <div class="title mt-4">
                            <div class="d-flex justify-content-around">
                             <div class="">
                             <h5 class="text-center">Classement des Données d'exportationdes pays de l'Afrique l'OUEST 
                            </h5>
                             </div>
                            <div id="tools"></div>

                            </div>
                            <div class="pays">
                                <p>Pays</p>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div id="chartdiv"></div>
                        <div class="text-center">
                            <h5></h5>
                        </div>
                        <div class="graph-botton">
                            <div class="legende">
                                <p> </p>
                            </div>
                            <div class="play-btn"><button onclick="prevYear()">Précédent</button></div>
                            <div class="play-btn"><button>Play</button></div>
                            <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
                            <div class="montant">
                                <p>Montant En millions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div >
                    <div class="title mt-4">
                            <div class="d-flex justify-content-around">
                             <div class="">
                             <h5 class="text-center">Classement des Données d'importation des pays de l'Afrique l'OUEST 
                            </h5>
                             </div>
                            <div id="tools"></div>

                            </div>
                            <div class="pays">
                                <p>Pays</p>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div id="chartdiv2"></div>
                        <div class="text-center">
                            <h5></h5>
                        </div>
                        <div class="graph-botton">
                            <div class="legende">
                                <p> </p>
                            </div>
                            <div class="play-btn"><button onclick="prevYear()">Précédent</button></div>
                            <div class="play-btn"><button>Play</button></div>
                            <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
                            <div class="montant">
                                <p>Montant En millions</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="">
                    <div class="title mt-4">
                            <div class="d-flex justify-content-around">
                             <div class="">
                             <h5 class="text-center">Classement Ballance commerciale des pays de l'Afrique l'OUEST 
                            </h5>
                             </div>
                            <div id="tools"></div>

                            </div>
                            <div class="pays">
                                <p>Pays</p>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div id="chartdiv3"></div>
                        <div class="text-center">
                            <h5></h5>
                        </div>
                        <div class="graph-botton">
                            <div class="legende">
                                <p> </p>
                            </div>
                            <div class="play-btn"><button onclick="prevYear()">Précédent</button></div>
                            <div class="play-btn"><button>Play</button></div>
                            <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
                            <div class="montant">
                                <p>Montant En millions</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--  -->
            <!--onglet  -->
            <!-- onglet fin -->

            <!--onglet2  -->
            <!-- onglet2 fin -->
            <!--onglet3  -->
            <!-- onglet3 fin -->
        </main>
        <footer> </footer>
    </div>
    <!--<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>-->
    <script src="./js/core.js"></script>
    <script src="./js/charts.js"></script>
    <script src="./js/animated.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script src="./js/graph.js"></script>

    <script src="./data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
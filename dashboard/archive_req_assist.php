<!DOCTYPE html>
<html>
    <head>
        <title>Design</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/dashboard.css" rel="stylesheet">
        <link href="../css/helpdesk.css" rel="stylesheet">
        <link href="../css/barangay_clearance.css" rel="stylesheet">
    <body>
        <div class="container-fluid">
            <nav id="nav" class="navbar navbar-expand-md navbar-dark py-0">
                <div class="container-fluid">
                    <button class="navbar-toggler ms-5 m-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
                        <ul class="navbar-nav me-auto mb-0 py-3 d-flex w-100">
                            <li class="nav-item flex-fill">
                                <a class="nav-link" href="./index">News</a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link custom_active" href="./helpdesk">Helpdesk</a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link" href="./activities">Activities</a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link" href="./guidebook">Guidebook</a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link" href="./information">Information</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <aside class="col p-5 pt-0">
                <a id="logo" class="navbar-brand m-0 py-3 text-center" href="index">
                    <img width="150px" height="60px" src="../img/logo.png" alt="assist onse">
                </a>
                <ul id="nav_side" class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light"href="#">Chatbox</a>
                    </li>

                    <li class="nav-item mt-5">
                        <a class="nav-link text-light custom_active" href="./req_assist">Requests & Assistance</a>
                    </li>

                    <li class="nav-item mt-5">
                        <a class="nav-link text-light" href="./complaints">Complaints</a>
                    </li>

                    <li class="nav-item text-center mb-3">
                        <a id="logout" class="nav-link text-light" href="#">Log Out</a>
                    </li>
                </ul>
            </aside>
            
            <div id="brgy_buttons" class="row m-0 pt-3 pe-0 pe-md-3 rounded-3">
            <div class="col-12 col-md-4 fs-6 mb-3 mb-md-0">
                <a class="btn btn-dark py-0 px-1 border-light custom_active" href="./archive_req_assist" id="archive">See Archive</a>
                <a class="btn btn-dark py-0 px-1 border-light" href="./declined_req_assist">Declined</a>
                <a class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></a>
            </div>
            <div class="col-6 col-md-4 text-center">
                <a class="btn btn-dark py-0 px-3 border-light" href="./history_req_assist">History</a>
            </div>
            <div class="col-6 col-md-4">
                <div id="brgy_clear_search" class="row bg-light w-100">
                    <a href="#"><i class="bi bi-search w-auto text-dark"></i></a>
                    <input type="text" class="form-control rounded-0" id="search_input">
                </div>
            </div>
        </div>

        <div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
            <div id="table_border" class="p-0 m-2">
                <div class="table-responsive">
                    <table class="table text-light text-center align-middle m-0">
                        <thead>
                        <tr height="70px" class="align-middle">
                            <th class="p-3" scope="col">Control No.</th>
                            <th class="p-3" scope="col">Date Submitted</th>
                            <th class="p-3" scope="col">Time Submitted</th>
                            <th class="p-3" scope="col">SC ID No.</th>
                            <th class="p-3 px-5" scope="col">Name</th>
                            <th class="p-3 px-5" scope="col">Residence Address</th>
                            <th class="p-3" scope="col">Request</th>
                            <th class="p-3 px-5" scope="col">Purpose</th>
                            <th class="p-3" scope="col">Action</th>
                            <th class="p-3" scope="col">Date Archived</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="d-none display1">
                                <th class="p-3 searchable" scope="row">01</th>
                                <th class="p-3" scope="row">01/01/2021</th>
                                <th class="p-3" scope="row">13:59</th>
                                <th class="p-3" scope="row">1001</th>
                                <td class="p-3 searchable">Dela Cruz, Juan</td>
                                <td>Blk 22 Lot 4 Kamias St. Brgy. Onse, San Juan, Manila</td>
                                <td class="p-3">Barangay Clearance</td>
                                <td class="p-3">
                                    Text text Text text <br>
                                    Text text Text text <br>
                                    Text text Text text
                                </td>
                                <td class="p-3">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><a href="#" class="text-light text-decoration-none">Restore</a></li>
                                        <li><a href="#" class="text-light text-decoration-none">Delete</a></li>
                                    </ul>
                                </td>
                                <td class="p-3">01/01/2021</td>
                            </tr>

                            <tr class="d-none display2">
                                <th class="p-3 searchable" scope="row">02</th>
                                <th class="p-3" scope="row">01/01/2021</th>
                                <th class="p-3" scope="row">13:59</th>
                                <th class="p-3" scope="row">1002</th>
                                <td class="p-3 searchable">Dela Cruz, Juan</td>
                                <td>Blk 22 Lot 4 Kamias St. Brgy. Onse, San Juan, Manila</td>
                                <td class="p-3">Barangay Clearance</td>
                                <td class="p-3">
                                    Text text Text text <br>
                                    Text text Text text <br>
                                    Text text Text text
                                </td>
                                <td class="p-3">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><a href="#" class="text-light text-decoration-none">Restore</a></li>
                                        <li><a href="#" class="text-light text-decoration-none">Delete</a></li>
                                    </ul>
                                </td>
                                <td class="p-3">01/01/2021</td>
                            </tr>

                            <tr class="d-none display3">
                                <th class="p-3 searchable" scope="row">03</th>
                                <th class="p-3" scope="row">01/01/2021</th>
                                <th class="p-3" scope="row">13:59</th>
                                <th class="p-3" scope="row">1003</th>
                                <td class="p-3 searchable">Dela Cruz, Juan</td>
                                <td>Blk 22 Lot 4 Kamias St. Brgy. Onse, San Juan, Manila</td>
                                <td class="p-3">Barangay Clearance</td>
                                <td class="p-3">
                                    Text text Text text <br>
                                    Text text Text text <br>
                                    Text text Text text
                                </td>
                                <td class="p-3">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><a href="#" class="text-light text-decoration-none">Restore</a></li>
                                        <li><a href="#" class="text-light text-decoration-none">Delete</a></li>
                                    </ul>
                                </td>
                                <td class="p-3">01/01/2021</td>
                            </tr>

                            <tr class="d-none display4">
                                <th class="p-3 searchable" scope="row">04</th>
                                <th class="p-3" scope="row">01/01/2021</th>
                                <th class="p-3" scope="row">13:59</th>
                                <th class="p-3" scope="row">1004</th>
                                <td class="p-3 searchable">Dela Cruz, Juan</td>
                                <td>Blk 22 Lot 4 Kamias St. Brgy. Onse, San Juan, Manila</td>
                                <td class="p-3">Barangay Clearance</td>
                                <td class="p-3">
                                    Text text Text text <br>
                                    Text text Text text <br>
                                    Text text Text text
                                </td>
                                <td class="p-3">
                                    <ul class="list-unstyled">
                                        <li class="mb-3"><a href="#" class="text-light text-decoration-none">Restore</a></li>
                                        <li><a href="#" class="text-light text-decoration-none">Delete</a></li>
                                    </ul>
                                </td>
                                <td class="p-3">01/01/2021</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {               
                const archive = document.querySelector('#archive');
                const url = new URL(window.location.href);
                archive.setAttribute('href', url);

                let params = new URLSearchParams(document.location.search.substring(1));
                let item1 = params.get('item1');
                let item2 = params.get('item2');
                let item3 = params.get('item3');
                let item4 = params.get('item4');


                if (document.querySelector('.display' + item1) != null)
                    document.querySelector('.display' + item1).classList.remove('d-none');

                if (document.querySelector('.display' + item2) != null)
                    document.querySelector('.display' + item2).classList.remove('d-none');

                if (document.querySelector('.display' + item3) != null)
                    document.querySelector('.display' + item3).classList.remove('d-none');

                if (document.querySelector('.display' + item4) != null)
                    document.querySelector('.display' + item4).classList.remove('d-none');
            });

            const search = document.querySelector('#search_input');

            search.addEventListener('keyup', (event) => {
                const trs = document.querySelectorAll("tr");

                trs.forEach(tr => {
                    const texts = tr.querySelectorAll('.searchable');

                    if (texts.length != 0) {
                        let params = new URLSearchParams(document.location.search.substring(1));
                        let item1 = params.get('item1');
                        let item2 = params.get('item2');
                        let item3 = params.get('item3');
                        let item4 = params.get('item4');

                        if (texts[0].innerHTML.includes(event.srcElement.value)) {
                            if(document.querySelector('.display' + item1) != null && tr.classList.contains('display' + item1))
                                tr.classList.remove('d-none');
                            else if(document.querySelector('.display' + item2) != null && tr.classList.contains('display' + item2))
                                tr.classList.remove('d-none');
                            else if(document.querySelector('.display' + item3) != null && tr.classList.contains('display' + item3))
                                tr.classList.remove('d-none');
                            else if(document.querySelector('.display' + item4) != null && tr.classList.contains('display' + item4))
                                tr.classList.remove('d-none');
                        } else {
                            if (texts[1].innerHTML.includes(event.srcElement.value)) {         
                                if(document.querySelector('.display' + item1) != null && tr.classList.contains('display' + item1))
                                    tr.classList.remove('d-none');
                                else if(document.querySelector('.display' + item2) != null && tr.classList.contains('display' + item2))
                                    tr.classList.remove('d-none');
                                else if(document.querySelector('.display' + item3) != null && tr.classList.contains('display' + item3))
                                    tr.classList.remove('d-none');
                                else if(document.querySelector('.display' + item4) != null && tr.classList.contains('display' + item4))
                                    tr.classList.remove('d-none');
                            } else {
                                tr.classList.add('d-none');
                            }
                        }
                    }
                });
            });
        </script>
    </body>
</html>
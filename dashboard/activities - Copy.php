<!DOCTYPE html>
<html>
    <head>
        <title>Design</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/dashboard.css" rel="stylesheet">
        <link href="../css/barangay_clearance.css" rel="stylesheet">
        <link href="../css/activities.css" rel="stylesheet">
        <link href="../css/registrations.css" rel="stylesheet">
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
                                <a class="nav-link" href="./helpdesk">Helpdesk</a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link custom_active" href="./activities">Activities</a>
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
                        <a class="nav-link text-light custom_active" href="./activities">Upcoming Activities</a>
                    </li>

                    <li class="nav-item mt-5">
                        <a class="nav-link text-light" href="./prev_activities">Previous Activities</a>
                    </li>

                    <li class="nav-item text-center mb-3">
                        <a id="logout" class="nav-link text-light" href="#">Log Out</a>
                    </li>
                </ul>
            </aside>

            <div id="brgy_buttons" class="row m-0 pt-3 pe-0 pe-md-3 rounded-3">
                <div class="col-12 col-md-4 fs-6 mb-3 mb-md-0">
                    <a class="btn btn-dark py-0 px-1 border-light" id="archive" href="./archive_activities">See Archive</a>
                    <button class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></button>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a class="btn btn-dark py-0 px-3 border-light" href="./add_activity">Add Activity</a>
                </div>
            </div>

            <div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
                <div id="table_border" class="mt-2 p-0">
                    <div class="table-responsive">
                        <table class="table text-light text-center align-middle m-0">
                            <thead>
                            <tr height="70px" class="align-middle">
                                <th scope="col">Control No.</th>
                                <th scope="col" width="200px">Date & Time</th>
                                <th scope="col">Activity Type</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Organizer</th>
                                <th scope="col">Venue</th>
                                <th scope="col" class="px-5">Benefits</th>
                                <th scope="col" class="px-4">Amount</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="d-none hidden1">
                                    <th scope="row">23</th>
                                    <td>
                                        <div class="form-group">
                                            <label>Date from:</label>
                                            <input type="datetime-local" class="form-control rounded-0" value="2021-08-16T08:00">
                                        </div>
                                        <div class="form-group">
                                            <label>Date until:</label>
                                            <input type="datetime-local" class="form-control rounded-0" value="2021-08-16T12:00">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" value="Seminar">
                                    </td>
                                    <td>
                                        <input type="text" value="Quarterly Seminar for Senior Citizens">
                                    </td>
                                    <td>
                                        <input type="text" value="Proident ullamco excepteur ipsum ex.">
                                    </td>
                                    <td>
                                        <input type="text" value="John D. Doe">
                                    </td>
                                    <td>
                                        <input type="text" value="Barangay Onse Covered Court">
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>
                                                <div class="form-group">
                                                    Item 1: <input type="text" value="T-Shirt">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    Item 2: <input type="text" value="Cash">
                                                </div>
                                            </li>
                                            <li class="text-center"><a href="#" class="text-light text-decoration-none"><i class="bi bi-plus-circle-fill"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>
                                                <div class="form-group">
                                                    Item 1: <input type="text" value="">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    Item 2: <input type="text" value="500">
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="text-light text-decoration-none">Save</a></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="display1">
                                    <th scope="row">23</th>
                                    <td>
                                        Date From: <br>
                                        08/16/2021 8:00am <br><br>

                                        Date until: <br>
                                        08/16/2021 12:00pm
                                    </td>
                                    <td>Seminar</td>
                                    <td>Quarterly Seminar for Senior Citizens</td>
                                    <td>Proident ullamco excepteur ipsum ex.</td>
                                    <td>John D. Doe</td>
                                    <td>
                                        Barangay Onse <br>
                                        Covered Court
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>Item 1: T-Shirt</li>
                                            <li>Item 2: Cash</li>
                                            <li class="text-center"><a href="#" class="text-light text-decoration-none"><i class="bi bi-plus-circle-fill"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>Item 1: N/A</li>
                                            <li>Item 2: P500</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_forward">Forward</a></li>
                                            <li><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_participants">Participants</a></li>
                                            <li><a href="#" data-id="1" class="edit text-light text-decoration-none">Edit</a></li>
                                            <li><a href="#" data-id="1" class="remove text-light text-decoration-none">Remove</a></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="d-none hidden2">
                                    <th scope="row">23</th>
                                    <td>
                                        <div class="form-group">
                                            <label>Date from:</label>
                                            <input type="datetime-local" class="form-control rounded-0" value="2021-08-16T08:00">
                                        </div>
                                        <div class="form-group">
                                            <label>Date until:</label>
                                            <input type="datetime-local" class="form-control rounded-0" value="2021-08-16T12:00">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" value="Seminar">
                                    </td>
                                    <td>
                                        <input type="text" value="Quarterly Seminar for Senior Citizens">
                                    </td>
                                    <td>
                                        <input type="text" value="Proident ullamco excepteur ipsum ex.">
                                    </td>
                                    <td>
                                        <input type="text" value="John D. Doe">
                                    </td>
                                    <td>
                                        <input type="text" value="Barangay Onse Covered Court">
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>
                                                <div class="form-group">
                                                    Item 1: <input type="text" value="T-Shirt">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    Item 2: <input type="text" value="Cash">
                                                </div>
                                            </li>
                                            <li class="text-center"><a href="#" class="text-light text-decoration-none"><i class="bi bi-plus-circle-fill"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>
                                                <div class="form-group">
                                                    Item 1: <input type="text" value="">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    Item 2: <input type="text" value="500">
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="text-light text-decoration-none">Save</a></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="display2">
                                    <th scope="row">24</th>
                                    <td>
                                        Date From: <br>
                                        08/16/2021 8:00am <br><br>

                                        Date until: <br>
                                        08/16/2021 12:00pm
                                    </td>
                                    <td>Seminar</td>
                                    <td>Quarterly Seminar for Senior Citizens</td>
                                    <td>Proident ullamco excepteur ipsum ex.</td>
                                    <td>John D. Doe</td>
                                    <td>
                                        Barangay Onse <br>
                                        Covered Court
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>Item 1: T-Shirt</li>
                                            <li>Item 2: Cash</li>
                                            <li class="text-center"><a href="#" class="text-light text-decoration-none"><i class="bi bi-plus-circle-fill"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled text-start">
                                            <li>Item 1: N/A</li>
                                            <li>Item 2: P500</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_forward">Forward</a></li>
                                            <li><a href="#" class="text-light text-decoration-none">Participants</a></li>
                                            <li><a href="#" data-id="2" class="edit text-light text-decoration-none">Edit</a></li>
                                            <li><a href="#" data-id="2" class="remove text-light text-decoration-none">Remove</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal" class="modal fade text-light" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header d-flex justify-content-start">
                    <button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    <h5 class="modal-title">View Profile</h5>
                </div>
                <div class="modal-body text-center mt-4">
                    <p class="m-0">Are you sure that the request is approved? <br>
                        The request entry will be transferred <br>
                        to the requests history.</p>
                </div>
                <div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
                    <button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
                </div>
                </div>
            </div>
        </div>

        <div id="modal_forward" class="modal fade text-light" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header d-flex justify-content-start">
                    <button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    <h5 class="modal-title">Forward</h5>
                </div>
                <form action="#">
                    <div class="modal-body text-center mt-4">
                        <p>Empty</p>
                    </div>
                    <div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
                        <button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div id="modal_participants" class="modal fade text-light" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-start">
                        <button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                        <h5 class="modal-title">Participants</h5>
                    </div>
                    <div class="modal-body text-center mt-4">
                        <ul class="list-unstyled p-2 m-0">
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="mb-2"><i class="bi bi-person-circle me-3"></i>Juan Dela Cruz</span></li>
                            <li class="text-center"><a href="#" class="text-decoration-none"><i class="bi bi-plus-circle-fill text-light"></i></a></li>
                        </ul>
                    </div>
                    <div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script>
            const edit = document.querySelectorAll('.edit');

            edit.forEach(e => 
                e.addEventListener('click', (event) => {
                     const hide = document.querySelector('.hidden' + event.srcElement.dataset.id);
                    const show = document.querySelector('.display' + event.srcElement.dataset.id);
                    
                    hide.classList.remove("d-none");
                    show.classList.add("d-none");
                })
            );

            const remove = document.querySelectorAll('.remove');

            remove.forEach(e => 
                e.addEventListener('click', (event) => {
                    const hide = document.querySelector('.display' + event.srcElement.dataset.id);
                    
                    hide.classList.add("d-none");
                    
                    const archive = document.querySelector('#archive');
                    
                    const url = new URL(archive);
                    url.searchParams.set('item' + event.srcElement.dataset.id, event.srcElement.dataset.id);

                    archive.setAttribute('href', url);
                })
            );
        </script>
    </body>
</html>
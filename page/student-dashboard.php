<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
   </head>
   <body>
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <p>Dummy Heading</p>
               <li class="active">
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                     <li>
                        <a href="#">Home 1</a>
                     </li>
                     <li>
                        <a href="#">Home 2</a>
                     </li>
                     <li>
                        <a href="#">Home 3</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="#">About</a>
               </li>
               <li>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                     <li>
                        <a href="#">Page 1</a>
                     </li>
                     <li>
                        <a href="#">Page 2</a>
                     </li>
                     <li>
                        <a href="#">Page 3</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="#">Portfolio</a>
               </li>
               <li>
                  <a href="#">Contact</a>
               </li>
            </ul>
            <ul class="list-unstyled CTAs">
               <li>
                  <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
               </li>
               <li>
                  <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                  <i class="fas fa-align-left"></i>
                  <span></span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-align-justify"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="../login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="jumbotron">
                        <h2>
                           Hello, world!
                        </h2>
                        <p>
                           This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                        </p>
                        <p>
                           <a class="btn btn-primary btn-large" href="#">Learn more</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6 bg-dark">
                           <div class="alert alert-dismissable alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                              ×
                              </button>
                              <h4>
                                 Alert!
                              </h4>
                              <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
                           </div>
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>
                                       #
                                    </th>
                                    <th>
                                       Product
                                    </th>
                                    <th>
                                       Payment Taken
                                    </th>
                                    <th>
                                       Status
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       1
                                    </td>
                                    <td>
                                       TB - Monthly
                                    </td>
                                    <td>
                                       01/04/2012
                                    </td>
                                    <td>
                                       Default
                                    </td>
                                 </tr>
                                 <tr class="table-active">
                                    <td>
                                       1
                                    </td>
                                    <td>
                                       TB - Monthly
                                    </td>
                                    <td>
                                       01/04/2012
                                    </td>
                                    <td>
                                       Approved
                                    </td>
                                 </tr>
                                 <tr class="table-success">
                                    <td>
                                       2
                                    </td>
                                    <td>
                                       TB - Monthly
                                    </td>
                                    <td>
                                       02/04/2012
                                    </td>
                                    <td>
                                       Declined
                                    </td>
                                 </tr>
                                 <tr class="table-warning">
                                    <td>
                                       3
                                    </td>
                                    <td>
                                       TB - Monthly
                                    </td>
                                    <td>
                                       03/04/2012
                                    </td>
                                    <td>
                                       Pending
                                    </td>
                                 </tr>
                                 <tr class="table-danger">
                                    <td>
                                       4
                                    </td>
                                    <td>
                                       TB - Monthly
                                    </td>
                                    <td>
                                       04/04/2012
                                    </td>
                                    <td>
                                       Call in to confirm
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="col-md-6 bg-dark">
                           <blockquote class="blockquote">
                              <p class="mb-0">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                              </p>
                              <footer class="blockquote-footer">
                                 Someone famous in <cite>Source Title</cite>
                              </footer>
                           </blockquote>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail First" src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail Second" src="https://www.layoutit.com/img/city-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="https://www.layoutit.com/img/sports-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
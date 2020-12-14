<nav id="sidebar">
   <div class="sidebar-header">
      <h3>Online Examination System</h3>
   </div>
   <ul class="list-unstyled components">
      <?php include '../functionalphp/get-nickname.php'; ?>
      <li>
         <a href="teacher-dashboard.php">Dashboard</a>
      </li>
      <li>
         <a href="teacher-release-exam.php">Releases an Exam</a>
      </li>
      <li class="active">
         <a href="teacher-checkandgrade-exam.php">Check and Grade a Paper</a>
      </li>
      <li>
         <a href="teacher-view-exam.php">View Student's Exam</a>
      </li>
   </ul>
</nav>
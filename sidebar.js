function loadNavbarDiv() {
  let navbar_code_str = '<div class="sidebar" style="background-color: #073c96; color: white;"><a class="active" href="#home">Home</a><a href="#news">Add/Update Class</a><a href="#contact">Add/Update Students</a><a href="#sanjna">Add/Update Courses</a><a href="#rohith">Add/Update Class-Course Combinations</a><a href="#rajib">Add/Update Results</a></div>';
  $('body').append(navbar_code_str);
}

// Then in the HTML file, you want to add navigation bar, add folowing code in your <head>

// <script src="sidebar.js"></script>
// <script>
//  $(document).ready(function(){
//      loadNavDiv();
//  });
// </script>
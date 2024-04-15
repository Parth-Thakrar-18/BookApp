@include('partials.header')
<link rel="stylesheet" href="css/sellerdash.css">
</head>
<body>
  @include('partials.sidebar')
  {{-- <a href="">Add Books</a>
  <a href="">Update Book Details</a>
  <a href="{{ route('logout') }}" class="btn btn-primary" style="float:right;">Logout</a> --}}
  {{-- <section>
    <h1>Full Table records</h1>
    <!-- TABLE CONSTRUCTION -->
    <table>
      <tr>

        <th>Role</th>
        <th>Power</th>
        <th>Name</th>
        <th>Email</th>
        <th>Added By</th>
        <th>Hobbie</th>
        <th>Edit Profile</th>
        <th>Delete Profile</th>
      </tr>
      // LOOP TILL END OF DATA
      @foreach ($books_seller as $book)
        <tr>
          <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          <td>{{ $book-> }}</td>
          
          <td><a href="">Edit</a></i></td>
          <td><a href="">Delete</a></i></td>
        </tr>
  @endforeach

    </table>
  </section> --}}
</body>
</html>
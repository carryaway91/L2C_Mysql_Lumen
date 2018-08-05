<!-- 
toto je tkz partial subor, je to urc. cast html kodu, ktora sa pouziva ako sablona na viacerych miestach v kode..
kebyze nemame tento kus kodu takto v samostatnom subore, tak pri nejake zmene, by sme museli zmenu vykonat na viacerych miestach
naraz na vsetkych podstankach....ked mame takuto sablonu mozme spravit jednu zmenu v tompo subore a zmena sa odrazi na viacerych miestach
kde je @includnuty tento script ...cize napr. v hlavnom scripte (master), mozme pridat @includ-nut tento konkretny subor, aj v inom subore
kde budem chciet trebarz nieco zmenit na linky namiesto obycajneho textu, tak staci zmenu spravit len tu a odrazi sa na kazdeh jednej podstranke
-->

<tr>
      <td>
      	<a href=" {{ url('director/' . $movie->director_id) }} ">{{ $movie->director }}</a></td>
      <td>
      	<a href="{{ url('movie/' . $movie->id ) }}">{{ $movie->title }}</a>
      </td>
      <td>{{ $movie->year }}</td>
      <td>
      	<a href="{{ url('genre/' . $movie->genre ) }} ">{{ $movie->genre }}</a></td>
      <td>{{ number_format($movie->gross, 2) }}</td>
      <td>
      	<a href="{{ url('movie/'.$movie->id.'/edit') }}">Update</a>
      	<a href="{{ url('movie/'.$movie->id.'/delete') }}">x</a>
      </td>
</tr>


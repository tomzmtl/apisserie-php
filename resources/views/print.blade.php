<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>A'pisserie</title>

    <link href="{{ url('/') }}/css/print.css" rel="stylesheet">
  </head>
  <body>

    <!-- Print -->

    <div id="print">

      <?php foreach ( $products as $section_id => $products ) : ?>

        <section data-sid="{{ $section_id }}">
          <h1>{{ $sections->where( 'id', $section_id, false )->first()->name }}</h1>

          <ul>

            <?php foreach ( $products as $product ) : ?>

              <li data-pid="{{ $product->id }}">
                  <span>
                    [ ] {{ $product->name }}
                  </span>
              </li>

            <?php endforeach ?>

          </ul>
        </section>

      <?php endforeach ?>

    </div>

    <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>
    <script src="{{ url('/') }}/js/scripts.min.js"></script>

  </body>
</html>
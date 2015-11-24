<h1>Articles</h1>
<hr>
@foreach($users as $user)
    <article>
        <h2>
            <?php echo "<pre>";var_dump($user);echo "</pre>"; ?>
        </h2>
    </article>
@endforeach

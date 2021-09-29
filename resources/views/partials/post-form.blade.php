{{--
  @Note : Use this from to convert an <a href=""> as a POST request
  @ Add class="href-as-post--js" to the link
  @ Add attribute data-attr-confirm-dialog="true" if a confirm popup needs to be shown
  @ Example: <a className="href-as-post--js" data-attr-confirm-dialog="true"
                href="/example.com"><img src="" alt="delete"/>
            </a>
--}}
<form action="" method="POST" class="post-form--js hidden">
    @csrf
</form>


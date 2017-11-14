# Laravel-Author
A simple way to generate the model's author user when created

This package adds a very simple trait to automatically save the user id who created this model.

Simply add the "\BinaryCabin\LaravelAuthor\Traits\HasAuthorUser;" trait to your model:

```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use \BinaryCabin\LaravelAuthor\Traits\HasAuthorUser;

}
```

If your column name is not "author_user_id", simply add a new property to your model named "authorUserIdFieldName":

protected $authorUserIdFieldName = 'user_id';

This trait also provides a relationship:

```
dump($project->authorUser)
```

and query scope:

```
dump(\App\Project::byAuthorUser($userId)->get());
```

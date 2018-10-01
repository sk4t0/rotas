# Answers
#### How long did you spend on the coding test? What would you add to your solution if you had more time?
I spent around 6/7 hours. With more time I think that I would redesign the SingleManning Class to implement DTO inside. I also saw at the end that when a member staff is alone for a Shift break it calculates 1 minutes less, but I didn't had time to debug it. Then I surely would add unit test to test all the functions (the test I've done i more a Feature test) and dockerize the application.

#### Why did you choose PHP as your main programming language?

Because I think that is the most flexible program language for web development. Also it is surely one of the most used.

#### What is your favourite thing about Laravel?

Flexibility, for sure. It is also intuitive and Eloquent just rule :)

#### What is your least favourite?

Maybe the same things that are my favourites. For example Laravel is so flexible and easy thanks to things like Facades or Eloquent, as I said. But Eloquent sometimes, when somethings go wrong, can be very hard to debug, because maybe  your method call is falling through the query builder. Facades, in the other hands, allows you to inject framework-specific dependencies all around the code without thinking about it. Maybe I would like that Laravel implements some guidelines, but I would have to think about it.

#### How would you track down a performance issue in production? Have you ever had to do this?

I've done this before. Usually to approach a performance issue on a webapp I use first Phpdebugbar. It gives to me some little indications to know where to start (example: a query with an high execution time). Then it depends: most of the time it depende from a not optimized query so I analize the query and alternative to it with some mysql tools like for example EXPLAIN.

#### EXTRA

I would explain my solution to the code test. I know that I took a risk because one of the criteria was "Please only include the files absolutely necessary to complete the task and run the tests". The first thing that I thinked was to create a laravel package installable via composer. But then I thinked that do the task using what I was working on during the last year could be a better way to make you know me. The application has a CRUD module (that you can see clicking on your name on the top-right corner and then to "modules" and that I used to create Rota, shift, shop, staff and shift break) that automatically generate migrations (and run it too), Web app controller, Api controller, Transformer, Model, Views. I started using LaraAdmin, but then I forked it to start moving towards an Api-first approach. I implemented 2FA, a file-manager that you can connect to different storage platforms (like s3), I improved the CRUD part. One of the reasons I forked it was also that it doesn't use standard Laravel criterias for eloquent in controllers or in migrations (you can see the differences between api controllers, made by me, and web app controllers). The next step is to move all the logic on the api's (I have it yet, I just have to modify webapp controllers to make internal calls to the api's). I'm not so satisfied by what I've done on this test, I was just getting well from the flu and I saw some errors too late, but I hope that from the code you can understand how I think. Many thanks.
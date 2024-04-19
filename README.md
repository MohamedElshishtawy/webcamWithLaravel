## Get Started

1. In your local server clone the project

git clone https://github.com/MohamedElshishtawy/webcamWithLaravel.git
cd webcamWithLaravel

2. migrate the database
    php artisan migrate

3. open the project 
    php artisan serve

4. take a photo then check your databae 

    you can use the photo in your blade file as  
      [<img src="{{$photo}}">]

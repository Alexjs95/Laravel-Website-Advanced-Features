@extends('layouts.forum')

@section('content')
    <h1>About</h1>
    <p>This website was created for a University assignment using Laravel.</p>

    <p>The scenario was an online forum where authenticated users can carry out CRUD operations.
        Discussion topics can be created which other users can view and respond. </p><br>

    <h3>Advanced Features</h3>
    <ul>
        <li>Hosted on AWS Elastic Beanstalk</li>
        <li>Google authentication using Socialite</li>
        <li>Twitter authentication using Socialite</li>
        <li>CKEditor to allow for HTML in topics</li>
        <li>Ability to upload images to topics</li>
        <li>Googlmapper by Brad Cornford to display user's location</li>
        <li>Application Load Balancer with SSL using AWS certificate manager</li>
        <li>Lavacharts displaying a bar chart showing users how many topics posted per week, makes use of Carbon to get dates</li>
        <li>Google ReCaptcha on registration page</li>
        <li>Added Gravatar to be displayed once user logs in</li>
        <li>Better search mechanism using package searchable by nicolalopezj</li>
        <li>Implemented pagination to display set number of topics on a page</li>
        <li>Stripe payment so that users can purchase ability to add images to their topics</li>
    </ul>
@endsection


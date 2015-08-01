/**
 * Created by JayDz on 1/08/15.
 */

app.factory('courseFactory', function ($resource) {

    var factory = {};

    var courses = [];

    factory.get = function () {
        courses = [
            {text: 'SEF'},
            {text: 'WP'},
            {text: 'DC'},
            {text: 'APT'}

        ];
        console.log('get');
        return courses;
    };

    factory.post = function (course) {
        console.log('post');

    };

    factory.put = function (course) {
        console.log('put');

    };

    factory.delete = function (course) {
        console.log('delete');

    };

    return factory

});
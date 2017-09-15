/*
define([], function(){
    alert("A simple RequireJS module");
    return {};
});*/

/*
define([], function () {
    var mageJsComponent = function()
    {
        alert("A simple magento component.");
    };

    return mageJsComponent;
});*/


/*
define([], function () {
    var mageJsComponent = function(config)
    {
        alert("Look in your browser's console");
        console.log(config);
        //alert(config);
    };

    return mageJsComponent;
});*/

define([], function () {
    var mageJsComponent = function(config, node)
    {
        console.log(config);
        console.log(node);
        //alert(config);
    };

    return mageJsComponent;
});
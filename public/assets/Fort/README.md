#Fort.js

Modern progress bar for form completion.
All you do is add the form and Fort.js' algorithm will take care of the rest. Best of all, it's super small. [Check out the demo!](http://idriskhenchil.github.io/default/index.html)

##Usage
Using Fort is so simple, it's simple. All you do is insert `fort.min.js` and `fort.min.css` into the `<head>` then pop in an `<input>` into `<div class="form">`. Anything outside of the `<div>` won't count. Now you just call the effect (Scroll down to the the "Effects" section for more). Yep, that's all there is to it. Fort does the rest.
```html
<head>
  <script src="fort.min.js"></script>
  <link rel="stylesheet" href="fort.min.css">
</head>
<body>
<div class="form">
  <form method="post">
    <input type="text">
  </form>
</div>
  <script>
      Fort.flash("#009DFF", "#000", "#6638F0");
  </script>
</body>
```

**Certain fields:**

If you want to include only certain fields add a class named `ignore` to the field. Fort will not detect the field after you do so.
##Effects
 * [Default](http://idriskhenchil.github.io/default/index.html) - `solid()`
 * [Gradient](http://idriskhenchil.github.io/gradient/index.html) - `gradient()`
 * [Sections](http://idriskhenchil.github.io/sections/index.html) - `sections()`
 * [Flash](http://idriskhenchil.github.io/flash/index.html) - `flash()`
 * [Merge](http://idriskhenchil.github.io/merge/index.html) - `merge()`

**Changing the colors:**
* Solid - `Fort.solid("#009DFF")` Keepin' it simple

* Gradient - `Fort.gradient("#009DFF", "#47B9FF")` Note that only two values should be passed.

* Sections - `Fort.sections("#009DFF", "#4AF2A1", "#FB5229")` The more colors you add, the more sections you get!

* Flash - `Fort.flash("#009DFF", "#000", "#6638F0");` Old school, yet unique.

* Merge `Fort.merge("#009DFF");` *Tip*: Add a few more colors and see what you get (Not 100% tested)

##Custom Configuration
Fort.js now supports custom configuration, which offers the following properties

`height`: Height in any CSS notation

`duration`: Any time like '3s' or '200ms'

`alignment`: Bottom or top

**Example**

    Fort.config({
    	height: '20px',
    	duration: '3s',
    	alignment: 'bottom'
    })
    
**Please note an effect must also be selected**

##Browser Support
 * Safari 7.0 
 * Opera 21 
 * Mozila Firefox 29 and up
 * Google Chrome 34 and up
 * Internet Exporer 8.0 and up 
 
##Coming soon
 * More effects. Have an idea? [Email](mailto:idriskhenchil@gmail.com) me!

##License
Fort.js is licensed under the MIT license (http://opensource.org/licenses/MIT)
It's pretty simple, but here's the definition we get

The MIT License is a permissive license that is short and to the point. It lets people do anything they want with your code as long as they provide attribution back to you and don't hold you liable.
##Acknowledgements

**Fort.js** is authored and maintained by Idris Khenchil,
feel free to check out the demo [here](http://idriskhenchil.github.io/default/index.html). Used Fort in a project? I'd love to see it, [email](mailto:idriskhenchil@gmail.com) me.


If you have a moment, check out [Magnitude](https://github.com/idriskhenchil/Magnitude/)! An ultra minimalistic screensaver for Mac.

(function($) {
    var images = null;
    var preloaded = {};
    
    var Rotator = {
        init: function(options, elem) {
            this.options = {
                timeout: 3000,
                duration: 1000,
                ignoreHover: false
            }
            this.options = $.extend({}, this.options, options);
            this.$currentPhoto = $(elem).find('img:eq(0)');
            currentZIndex = String(this.$currentPhoto.css('z-index'));
            this.hotelId = this.$currentPhoto.attr('data-hotelid');
            if(!images[this.hotelId] || !images[this.hotelId].length || images[this.hotelId].length < 2)
                return false;
            this.$nextPhoto = this.$currentPhoto.clone();
            var cssProps = {'position':'absolute', 'top': '0px', 'left': '0px', 'opacity': '0.0'};
            if(this.options.zIndex)
                cssProps['z-index'] = this.options.zIndex;
            else if(currentZIndex.match(/^\d+$/))
                cssProps['z-index'] = parseInt(currentZIndex) - 1;
            this.$nextPhoto.css(cssProps).insertAfter(this.$currentPhoto);
            this.index = 0;
            this.isHovered = false;
            this.timer = null;
            this.swapping = false;
            this.swapDir = 'next';
            this.preloadNext();
            this.counter = 0;
            this.buttonClicked = false;
            return true;
        },
        preloadNext: function() {
            if(this.index < images[this.hotelId].length - 1)
                var nextIndex = this.index + 1;
            else
                var nextIndex = 0;
            var url = images[this.hotelId][nextIndex];
            if(!preloaded[url]) {
                var img = new Image();
                img.src = url;
                preloaded[url] = img;
            }
        },
        swapImages: function() {
            if(!this.isHovered)
                return;
            this.swapping = true;
            var thisObj = this;
            if(this.swapDir == 'next')
                newIndex = this.index + 1;
            else
                newIndex = this.index - 1;
            this.$nextPhoto.attr('src', images[this.hotelId][newIndex]);  
            this.$nextPhoto.animate({'opacity':'1.0'}, this.options.duration, 'linear');
            this.$currentPhoto.animate({'opacity':'0.0'}, this.options.duration, 'linear', function() { thisObj.swapFinished() });
        },
        swapFinished: function() {
            if(this.index < images[this.hotelId].length - 1)
                this.index++
            else
                this.index = 0;
            
            var temp = this.$currentPhoto;
            this.$currentPhoto = this.$nextPhoto;
            this.$nextPhoto = temp;
          
            var thisObj = this;
            this.swapping = false;
            this.preloadNext();
            if(!this.buttonClicked)
                this.timer = setTimeout(function() { thisObj.swapImages() }, this.options.timeout);
            this.counter++;
            if(!this.isHovered)
                this.trackViews();
        },
        mouseover: function(e) {
            if(this.isHovered || this.swapping || this.buttonClicked)
                return;
            if(this.options.ignoreHover && $(e.target).closest('.' + this.options.ignoreHover).length)
                return;
            this.counter = 0;
            this.$currentPhoto.attr('alt', '');
            this.$nextPhoto.attr('alt', '');
            clearTimeout(this.timer);
            this.isHovered = true;
            this.swapDir = 'next';
            this.swapImages();
        },
        mouseout: function(e) {
            this.isHovered = false;
            clearTimeout(this.timer);
            if(!this.swapping)
                this.trackViews();
        },
        button: function(e, dir) {
            e.preventDefault();
            if(!this.buttonClicked && this.isHovered || this.swapping)
                return;    
            this.buttonClicked = true;
            clearTimeout(this.timer);
            this.isHovered = true;
            this.swapDir = dir;
            this.swapImages();
        },
        trackViews: function() {
            var count = String(this.counter);
            if(this.counter < 2)
                return;
            if($('body').hasClass('roundup'))
                var eCategory = 'roundup image rotate';
            else
                var eCategory = 'search image rotate'
        }
    }
    
    $.fn.imageRotator = function(options) {
        options = options || {};
        
        images = options.images;
        if(this.length) {
            return this.each(function() {
                var instance = Object.create(Rotator); 
                var success = instance.init(options, this);
                if(success) {
                    $(this).bind('mouseover', function(e) {
                        instance.mouseover(e);
                    });
                    $(this).bind('mouseout', function(e) {
                        instance.mouseout();   
                    });
                    $(this).find('.rot-next').bind('click', function(e) {
                        instance.button(e, 'next'); 
                    });
                    $(this).find('.rot-prev').bind('click', function(e) {
                        instance.button(e, 'prev');
                    });
                }
            });
        }
    }
})(jQuery);
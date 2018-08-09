
// global for the sake of this example
var Expos = new ExpoList();
var Halls = new HallList();
var App = null;

/**
 * The App for Expo Map
 */
var AppView = Backbone.View.extend({

    el: $("#hub"),

    //--------------------------------------
    // Event wiring (events and event handlers)

    events: {
      'click #book' : 'book_expo'
    },

    book_expo : function (e) {
      // e.preventDefault();

      // console.log(e);
    },

    show_content : function (m) {
      this.hub.show();

      this.$el.find('#id').val(m.id);
      this.$el.find('#name').html(m.title);
      this.$el.find('#location').html(m.address);
      this.$el.find('#date').html(m.date);
      this.$el.find('#book').removeAttr('disabled');

    },

    // END Events and event handlers
    //----------------------------------


    //--------------------------------------
    // Initialise map
    //--------------------------------------
    _initialize_map : function() {
      var center = new google.maps.LatLng(41.2039564,29.0408791);
      var styles = [
        {
          elementType: "geometry",
          stylers: [
            { lightness: 33 },
            { saturation: -90 }
          ]
        }
      ];

      var mapOptions = {
          zoom: 9,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: center,
          styles: styles
      };
      this.map = new google.maps.Map(document.getElementById('map_canvas'),
        mapOptions);
    },


    //--------------------------------------
    // Initialise app
    //--------------------------------------

    initialize: function() {
      var self = this;

      // cache DOM elements for faster access
      self.map_canvas = $('#map_canvas');
      self.header = $('header');
      self.hub = $('#hub');

      // initialize map
      self._initialize_map();

      self.hub.hide();


      setTimeout(function() { // fetch data with some delay
        Expos.fetch();
        // create views
        var list_view = new ExpoListView({model: Expos, map: self.map});
      }, 2000);
    }
});

/**
 * The App for Hall Map
 */
var HallView = Backbone.View.extend({

    el: $("#hub"),

    //--------------------------------------
    // Event wiring (events and event handlers)

    events: {
      'click #book' : 'book_expo'
    },

    book_expo : function (e) {
      e.preventDefault();
      window.location='/halls/book/' + $('#id').val();
    },

    show_content : function (m) {
      this.hub.show();
      this.$el.find('#id').val(m.id);
      this.$el.find('#status').html(((m.booked == 1) ? 'Already Booked' : 'Available'));
      this.$el.find('#name').html(m.name);
      this.$el.find('#location').html(m.id);
      this.$el.find('#date').html(m.id);
      if (m.booked == 0) {
        this.$el.find('#book').removeAttr('disabled');
        this.$el.find('#contact,#bookedby,#documents').html('N/A');
      } else {
        this.$el.find('#book').attr('disabled','disabled');
        this.$el.find('#bookedby').html('<img src="'+m.logo+'" />');
        this.$el.find('#documents').html('<a href="'+m.documents+'">Download Documents</a>');
        this.$el.find('#contact').html('<a href="mailto:'+m.mail+'">'+m.contact+'</a>');
      }

    },

    // END Events and event handlers
    //----------------------------------


    //--------------------------------------
    // Initialise map
    //--------------------------------------
    _initialize_map : function() {

      var center = new google.maps.LatLng($('#lat').val(),$('#lon').val());
      var styles = [
        {
          elementType: "geometry",
          stylers: [
            { lightness: 33 },
            { saturation: -90 }
          ]
        }
      ];

      var hallOptions = {
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: center,
          styles: styles
      };

        this.map = new google.maps.Map(document.getElementById('map_canvas'),
          hallOptions);




    },


    //--------------------------------------
    // Initialise app
    //--------------------------------------

    initialize: function() {
      var self = this;

      // cache DOM elements for faster access
      self.map_canvas = $('#map_canvas');
      self.header = $('header');
      self.hub = $('#hub');

      // initialize map
      self._initialize_map();

      self.hub.hide();


      setTimeout(function() { // fetch data with some delay
        Halls.fetch();
        // create views
        var hall_list_view = new HallListView({model: Halls, map: self.map});
      }, 2000);
    },

    // Fetch and Render each Expos
    //----------------------------------
    render: function() {
      var self = this;
        this.collection.fetch({
            success: function(response) {
              response.models.forEach(function(item){
                Halls.add_new(item.attributes);
              });
            },
            error: function() {
                console.log('Failed to fetch!');
            }
        });
    }
});

/**
 * The App for Reservation Page
 */
var ReservationView = Backbone.View.extend({
  el: $("#hub"),

  events: {
    'click #changeExpo' : 'changeExpo',
    'click #changeHall' : 'changeHall'
  },

  changeExpo : function (e) {
    e.preventDefault();
    window.location='/home';
  },

  changeHall : function (e) {
    e.preventDefault();
    window.history.back();
  }
});


var MyRouter = Backbone.Router.extend({
    routes: {
        '': 'home',
        'home': 'home',
        'halls/book/:id': 'reservation',
        'halls': 'hall'
    },
    home: function() {
        App = new AppView();
    },
    hall: function() {
        // render hall view
        HallView = new HallView();
    },
    reservation: function() {
        // render reservation view
        ReservationView = new ReservationView();
    }
    // ...
});

// Load the application once the DOM is ready, using `jQuery.ready`:
$(function() {

    router = new MyRouter();
    Backbone.history.start({pushState: true});

});

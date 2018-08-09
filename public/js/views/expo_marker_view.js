
/**
 * Expo Marker View
 * The DOM element for a expo marker.
 */

var ExpoMarkerView = Backbone.View.extend({

    tagName:  "li",

    initialize: function(options) {

      var self = this;

      self.model = options.model;
      self.model.on('remove', self.remove, self);

      self.map = options.map;

      var pos = self.model.get('pos');

      self.marker = new google.maps.Marker({
          map: self.map,
          position: new google.maps.LatLng(pos.lat, pos.lon),
          animation: google.maps.Animation.DROP,
          icon : 'img/cursor.png',
          title: self.model.get('name'),
          date: self.model.get('date'),
          address: self.model.get('address'),
          descr : self.model.get('descr'),
          id : self.model.get('expo_id')
      });

      self.marker.infowindow = new google.maps.InfoWindow({
        content: self.marker.descr
      });

      google.maps.event.addListener(self.marker, 'mouseover', self.show_expo_info);
      google.maps.event.addListener(self.marker, 'mouseout', self.hide_expo_info);
      google.maps.event.addListener(self.marker, 'click', self.show_expo_detail);

    },

    //---------------------------------------
    // Event handlers for marker events

    show_expo_detail : function() {
      this.infowindow.close();
      App.show_content(this);
    },


    hide_expo_info : function() {
      this.setIcon('img/cursor.png');
      this.infowindow.close();
    },

    show_expo_info : function() {
      this.setIcon('img/cursor_selected.png');
      this.infowindow.open(this.map, this);
    },

    // END Events and event handlers
    //----------------------------------

    render: function() {},

    remove : function() {
      this.marker.setMap(null);
      this.marker = null;
    }
});

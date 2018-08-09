
/**
 * Hall Marker View
 * The DOM element for a hall marker.
 */

var HallMarkerView = Backbone.View.extend({

    tagName:  "li",

    centroid:  function(pts) {
      console.log(pts.length);
     var nPts = pts.length;
     var x=0; var y=0;
     var f;
     var j=nPts-1;
     var p1; var p2;

     for (var i=0;i<nPts;j=i++) {
        p1=pts[i]; p2=pts[j];
        f=p1.lng*p2.lat-p2.lng*p1.lat;
        x+=(p1.lng+p2.lng)*f;
        y+=(p1.lat+p2.lat)*f;
     }

     f=this.calcPolygonArea(pts)*6;

     return [x/f, y/f];
  },

  calcPolygonArea: function(vertices) {
      var total = 0;

      for (var i = 0, l = vertices.length; i < l; i++) {
        var addX = vertices[i].lng;
        var addY = vertices[i == vertices.length - 1 ? 0 : i + 1].lat;
        var subX = vertices[i == vertices.length - 1 ? 0 : i + 1].lng;
        var subY = vertices[i].lat;

        total += (addX * addY * 0.5);
        total -= (subX * subY * 0.5);
      }

      return Math.abs(total);
  },

    initialize: function(options) {

      var self = this;

      var coordinates = self.model.get('coordinates');

      self.model = options.model;
      self.model.on('remove', self.remove, self);

      self.map = options.map;

      if (self.model.get('booked')==0) {
        var color = '#00FF00';
        if (self.model.get('price')>0){
          var price = ' ($' + self.model.get('price') + ')';
        } else {
          var price = ' (FREE!)';
        }
      } else {
        var color = '#FF0000';
        var price = '';
      }




      self.marker = new google.maps.Polygon({
          paths: coordinates,
          strokeColor: color,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: color,
          fillOpacity: 0.35,
          id: self.model.get('hall_id'),
          booked: self.model.get('booked'),
          name: self.model.get('name'),
          user: self.model.get('user'),
          mail: self.model.get('mail'),
          coordinates: self.model.get('coordinates'),
          price: self.model.get('price'),
          logo: self.model.get('logo'),
          contact: self.model.get('contact'),
          documents: self.model.get('documents')
      });


      var c = self.centroid(coordinates);

      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(c[1],c[0]),
          icon: self.model.get('logo'),
          map: self.map
        });

      var mapLabel = new MapLabel({
      text: self.model.get('name') + price,
      position: new google.maps.LatLng(c[1],c[0] ),
      map: self.map,
      fontSize: 14,
      align: 'center'
      });
      mapLabel.set('position', new google.maps.LatLng(c[1],c[0]));



      mapLabel.bindTo('map', self.marker);

      self.marker.setMap(self.map);

      google.maps.event.addListener(self.marker, 'click', self.show_hall_detail);

    },

    //---------------------------------------
    // Event handlers for marker events

    show_hall_detail : function() {
      HallView.show_content(this);
    },


    // END Events and event handlers
    //----------------------------------

    render: function() {},

    remove : function() {
      this.marker.setMap(null);
      this.marker = null;
    }
});

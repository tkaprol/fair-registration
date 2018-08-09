
/**
 * Hall List View
 * The DOM element for a list of hall items.
 */

var HallListView = Backbone.View.extend({

    el:  $("#companies_holder"),

    initialize: function(options) {
      this.map = options.map;
      this.model.on('add', this.added_hall, this);

      // initialize position
      this.$el.css({display: 'none', right:'20px', top: '120px'}, 2000);
      this.$el.fadeIn('500');

      _.bindAll(this, 'render');
      this.collection = new HallList();
      this.render();
    },

    //----------------------------------
    // Events and event handlers

    events: {
    },


    // END Events and event handlers
    //----------------------------------

    added_hall : function(hall){
      var marker_view = new HallMarkerView({ model: hall, map: this.map });
    },

    // Fetch and Render each Halls
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

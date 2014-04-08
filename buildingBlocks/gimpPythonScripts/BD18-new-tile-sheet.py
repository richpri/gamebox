#!/usr/bin/env python

# Copyright (c) 2014 Richard E. Price under the The MIT License.
# A copy of this license can be found in the LICENSE.text file
# or at http://opensource.org/licenses/MIT 
import os
from gimpfu import *

def new_tile_sheet(img, layer, columnCount):
    ''' Create a new tile sheet.
    
    Parameters:
    img : image The current image (unused).
    layer : layer The layer of the image that is selected (unused).
    columnCount : [int] The number of columns in this tile sheet.
    '''
    # Calculate the width of the tile sheet.
    newWidth = 20 + (columnCount * 120)
    pdb.gimp_context_set_background((0, 102, 255))
    theImage = pdb.gimp_image_new(newWidth, 800, 0)
    theLayer = pdb.gimp_layer_new(theImage, newWidth, 800, 0, "theLayer", 100, 0)
    pdb.gimp_drawable_fill(theLayer, 1)
    pdb.gimp_image_add_layer(theImage, theLayer, 0)
    pdb.gimp_display_new(theImage)
    return 0
    
register(
    "new_tile_sheet",
    "New tile sheet",
    "Create a new tile sheet.",
    "Rich Price",
    "Open source MIT License",
    "2014",
    "<Image>/Filters/BD18/New-Tile-Sheet",
    "",
    [(PF_SPINNER, "columnCount", "Column Count", 1, (1,30,1))],
    [],
    new_tile_sheet)

main()

#!/usr/bin/env python

# Copyright (c) 2014 Richard E. Price under the The MIT License.
# A copy of this license can be found in the LICENSE.text file
# or at http://opensource.org/licenses/MIT 

from gimpfu import *

def token_adjust(inImg, inLayer) :
    ''' Adjust the scale of a token image.
    
    Parameters:
    inImg   : The current image.
    inLayer : The layer of the image that is selected.
    '''
    w = gimp.pdb.gimp_image_width(inImg) + 100
    h = gimp.pdb.gimp_image_height(inImg) + 100
    pdb.gimp_image_resize(inImg, w, h, 50, 50)
    bigLayer = pdb.gimp_image_flatten(inImg)
    pdb.plug_in_autocrop(inImg, bigLayer)
    pdb.gimp_layer_flatten(bigLayer)
    pdb.gimp_image_scale(inImg, 30, 30)
    
register(
    "token_adjust",
    "Adjust the scale of a token image",
    "Scale it to 30x30 pix",
    "Rich Price",
    "Open source MIT License",
    "2014",
    "<Image>/Filters/BD18/Token-Adjust",
    "*",
    [],
    [],
    token_adjust)

main()

<?php

/*
Plugin Name: SpareMin
Plugin URI: http://sparemin.com
Description: Safely receive and record short timed calls from anyone who wants to talk to you, in your spare time.
Version: 3.0.1
Author: SpareMin
Author URI: http://sparemin.com
Text Domain: sparemin
Domain Path: /languages
License: GPLv2
*/

/*
Copyright (c) 2012-2016 SpareMin
All rights reserved.

This software is distributed under the GNU General Public License, Version 2,
June 1991. Copyright (C) 1989, 1991 Free Software Foundation, Inc., 51 Franklin
St, Fifth Floor, Boston, MA 02110, USA

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

*******************************************************************************
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*******************************************************************************
*/



/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load SpareMin
 */
function sparemin_init() {

	$file       = dirname( __FILE__ ) . '/sparemin.php';
	$plugin_url = plugin_dir_url( $file );

	define( 'SPAREMIN__INIT', true );
	define( 'SPAREMIN__VERSION', '3.0.1' );
	define( 'SPAREMIN__PLUGIN_URL', $plugin_url );
	define( 'SPAREMIN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

	require_once( SPAREMIN__PLUGIN_DIR . '/includes/class-sparemin.php' );
}
add_action( 'plugins_loaded', 'sparemin_init' );

/** Theme Extended Features */
const ThemeExtend =
{
  fontFamily: {
    poppins: ["Poppins", "sans-serif"],
    roboto: ["Roboto", "sans-serif"],
  },
  
  colors: {
    pri: "#081F4D",
    sec: "#0083FF",
    gen: "#3B4D71",
    "our-bg": "#D9E6FF",
  },
};

/**  Main Configuration */
module.exports = {
	purge: [],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: ThemeExtend,
	},
	variants: {
		extend:{},
	},
	plugins: [],
};

define({ "api": [
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./doc/main.js",
    "group": "C__wamp64_www_upc_dpmapi_doc_main_js",
    "groupTitle": "C__wamp64_www_upc_dpmapi_doc_main_js",
    "name": ""
  },
  {
    "type": "get",
    "url": "/vehicles/",
    "title": "Read all vehicles data",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>(required) - Your API key.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-Example:",
          "content": "{\n  \"X-API-KEY\": \"{Api key value}\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "1.0.0",
    "name": "GetVehicles",
    "group": "Vehicles",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>If the request was successful or not. Options: ok, error. In the case of error a message property will be populated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array[]",
            "optional": false,
            "field": "vehicles",
            "description": "<p>A list of the vehicles available.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Example response:",
          "content": "{\n  \"status\": 'ok',\n  \"vehicles\": [\n   {\n      \"id\": \"1\",\n      \"model\": \"YARIS\",\n      \"licencePlate\": \"P9L-980\",\n      \"color\": \"GRIS\",\n      \"manufactureYear\": \"2015\",\n      \"engineNumber\": \"MO899EDTR92\",\n      \"serialNumber\": \"89OLL343\",\n      \"idBrand\": \"74\"\n   },\n   {\n      \"id\": \"2\",\n      \"model\": \"ACCENT\",\n      \"licencePlate\": \"J8L-908\",\n      \"color\": \"BLANCO\",\n      \"manufactureYear\": \"2016\",\n      \"engineNumber\": \"09OLKO9OO\",\n      \"serialNumber\": \"34EWQS34\",\n      \"idBrand\": \"31\"\n      }\n  ]\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoAccessRight",
            "description": "<p>Only authenticated Admins can access the data.</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>The <code>id</code> of the User was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 403 Unautorized\n{\n  \"status\": \"error\",\n  \"message\": \"Invalid API key \"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./application/controllers/Vehicle.php",
    "groupTitle": "Vehicles"
  }
] });

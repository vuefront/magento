import axios from 'axios'
import { each, isObject, isArray } from 'lodash'
/**
 * Connecting and configuring the plugin to send requests to the API
 * @author Dreamvention <info@dreamvention.com>
 * @date 20.12.2018
 */
export default ({ token, baseURL, app, store }, inject) => {
  const inst = axios.create({
    baseURL,
    headers: {
      'Content-Type': 'application/json; charset=UTF-8',
      'Authorization': `bearer ${token}`
    }
  })
  /**
   * Convert url to opencart url
   * @param {string} url Source URL
   * @returns {string} Transformed URL
   */
  const parseUrl = url => {
    url = url.replace(/^(\/api\/)/g, 'rest/V1/vuefront/information/')
    url = `${url}?cors=true`
    return url
  }
  /**
   * Converting data from JSON to a string suitable for opencart
   * @param {any} data Request data
   * @returns {string} Data as a string
   */
  const parseData = data => {
    let res = ''
    each(data, (val, key) => {
      if (isObject(val) || isArray(val)) {
        val = encodeURIComponent(JSON.stringify(val))
      }
      res += `${key}=${val}&`
    })
    return res
  }
  /**
   * Proxy for axios
   */
  const axiosProxy = {
    /**
     * Proxy for GET requests
     * @param {string} url Url that is being requested
     * @param {any} config Request Settings
     * @returns Query result
     */
    async get(url, config) {
      url = parseUrl(url)

      return await inst.get(url, {...config, withCredentials: true})
    },
    /**
     * Proxy for POST requests
     * @param {string} url Url that is being requested
     * @param {any} data Request data
     * @param {any} config Request Settings
     * @returns Query result
     */
    async post(url, data, config = {}) {
      url = parseUrl(url)
      return await inst.post(url, data, {...config, withCredentials: true})
    },
    /**
     * Proxy for DELETE requests
     * @param {string} url Url that is being requested
     * @param {any} data Request data
     * @param {any} config Request Settings
     * @returns Query result
     */
    async delete(url, data, config = {}) {
      url = parseUrl(url)

      return await inst.delete(url, data, {...config, withCredentials: true})
    },
    /**
     * Proxy for PUT requests
     * @param {string} url Url that is being requested
     * @param {any} data Request data
     * @param {any} config Request Settings
     * @returns Query result
     */
    async put(url, data, config = {}) {
      url = parseUrl(url)

      return await inst.put(url, data, {...config, withCredentials: true})
    }
  }

  inject('axios', axiosProxy)
}

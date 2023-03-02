using UnityEngine;

public class BasicPendulum : MonoBehaviour
{
    public float gravity = 9.81f;

    private float _angle;
    private float _length;

    public Transform pivot;

    void Awake()
    {
        if (pivot == null)
        {
            pivot = new GameObject().transform;
            pivot.position = transform.position + new Vector3(9,9,0);
            transform.SetParent(pivot);
        }

        float angleRadians = Mathf.Atan2(pivot.position.y - transform.position.y, pivot.position.x - transform.position.x);
        _angle = angleRadians * Mathf.Rad2Deg - 90;
        _length = Vector2.Distance(pivot.position, transform.position);
    }

    void Update()
    {
        float period = Mathf.Pow(_length / gravity, 1f / (2 * Mathf.PI));
        float x = _angle * Mathf.Cos(2 * Mathf.PI / period * Time.time);

        transform.localPosition = new Vector3(0, -_length, 0);
        transform.parent.eulerAngles = new Vector3(0, 0, x);
    }
}
